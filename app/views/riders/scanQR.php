<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/riders/scanQR.css">
    <link rel="icon" href="<?php echo URLROOT;?>/public/images/general/favicon.png">
    <title>QR Code Scanner</title>
    <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script>
</head>
<body>
    <?php require APPROOT . '/views/inc/header-rider.php'; ?>

    <div id="container">
        <div id="upper_section">
            <div id="cancel_button">
                <a href="<?php echo URLROOT;?>/riders/riderLandPage"><img src="<?php echo URLROOT;?>/public/images/general/crossIcon1.png" alt="cancel"></a>
            </div>

            <div id="main_text">
                <h1>Scan to ride</h1>
                <div id="sub_text">
                    Locate the QR code on the bike
                </div>
            </div>
        </div> 
        
        <div class="middle_section">
            <div class="btn-scan-qr">
                <a id="btn-scan-qr">
                    <img src="<?php echo URLROOT;?>/public/images/general/scanIcon.png">
                </a>
            </div>
            
            <!-- <div class="middle_section btn-scan-qr qr-canvas">
                <canvas hidden="" id="btn-scan-qr qr-canvas"></canvas>
            </div>
                
            <div id="qr-result" hidden="">
                <b>Data:</b> <span id="outputData"></span>
            </div> -->
            
        </div>

        <div class="middle_section a" id="a" hidden="true">
            <canvas hidden="" id="qr-canvas"></canvas>
        </div>

        <div class="middle_section b" id="b" hidden="true">
            <div id="qr-result" hidden="">
                <!-- <b>Data:</b> <span id="outputData"></span> -->
                <div id="main_text2">
                    <h1>Start Ride</h1>
                </div>
                <!-- <a href="<?php echo URLROOT;?>/riders/riderLandPage" onclick="location.href=res;return false;"><img src="<?php echo URLROOT;?>/public/images/general/startIcon.png" alt="start"></a> -->
                <form action="<?php echo URLROOT;?>/riders/activeRide" id="start_form" method="POST">
                    <!-- <a id="outputData2">
                        <img src="<?php echo URLROOT;?>/public/images/general/startIcon.png">
                    </a> -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_ID']; ?>">
                    <input type="hidden" name="bicycleID" value="0" id="bicycle_ID">
                    <input type="hidden" name="userLat" value="0" id="userLat">
                    <input type="hidden" name="userLong" value="0" id="userLong">
                    <input type="image" id="submit" src="<?php echo URLROOT;?>/public/images/general/startIcon.png" alt="start" onclick="getUserPos(event)">
                </form>
            </div>
        </div>
        <div id="error">
            <?php echo $data['rideDetailObject_err']?>
        </div>
        <!-- <div id="lower_section">
            <div id="paymentM_button">
                <a href="<?php echo URLROOT;?>/riders/riderLandPage"><img src="<?php echo URLROOT;?>/public/images/general/payIcon.png" alt="payM"></a>
            </div>

            <div id="sub_text">
                Change your payment method
            </div>
        </div>  -->

    </div>

    <script>
        //var qrcode = window.qrcode;
        const a = document.getElementById("a");
        const b = document.getElementById("b");
        a.style.visibility = "hidden";
        b.style.visibility = "hidden";

        const start_form = document.getElementById("start_form");
        const bicycle_ID = document.getElementById("bicycle_ID");
        const userLat = document.getElementById("userLat");
        const userLong = document.getElementById("userLong");
        
        const video = document.createElement("video");
        const canvasElement = document.getElementById("qr-canvas");
        const canvas = canvasElement.getContext("2d");

        const qrResult = document.getElementById("qr-result");
        //const outputData = document.getElementById("outputData");
        const btnScanQR = document.getElementById("btn-scan-qr");

        let scanning = false;

        qrcode.callback = res => {
        if (res) {
            //outputData.innerText = res;
            //outputData2.href = res;
            // start_form.action = start_form.action+'/'+res;
            bicycle_ID.value = res;
            scanning = false;

            video.srcObject.getTracks().forEach(track => {
            track.stop();
            });

            qrResult.hidden = false;
            canvasElement.hidden = true;
            btnScanQR.hidden = false;
            a.style.visibility = "hidden";
            b.style.visibility = "visible";
            
        }
        };

        btnScanQR.onclick = () => {
        navigator.mediaDevices
            .getUserMedia({ video: { facingMode: "environment" } })
            .then(function(stream) {
            scanning = true;
            qrResult.hidden = true;
            btnScanQR.hidden = true;
            canvasElement.hidden = false;
            a.style.visibility = "visible";
            video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
            video.srcObject = stream;
            video.play();
            tick();
            scan();
            });
        };

        function tick() {
            canvasElement.height = video.videoHeight;
            canvasElement.width = video.videoWidth;
            canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);

            scanning && requestAnimationFrame(tick);
        }

        function scan() {
            try {
                qrcode.decode();
            } catch (e) {
                setTimeout(scan, 300);
            }
        }

        //function to get user position with geolocation in terms of lat and long and give it to the userLat and userLong hidden inputs
        function getUserPos(event) {
            event.preventDefault(); // prevent default form submission behavior
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    userLat.value = pos.lat;
                    userLong.value = pos.lng;
                    start_form.submit();
                    },
                );
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }
    </script>
</body>
</html>