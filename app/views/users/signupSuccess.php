<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/error.css">
    <link rel="icon" href="<?php echo URLROOT;?>/public/images/general/favicon.png">
    <title>Signup success</title>

    <style>
        *,
        *::before,
        *::after{
            box-sizing: border-box;
        }

        /* get local font to the webpage */
        @font-face {
            font-family: 'sfmy-regular';
            src:url('../fonts/SF-Pro-Rounded-Regular.otf');
        }

        :root{
            --clr-dark : #efebeb;
            --clr-light : #fff;

            --fs-h1 : 3rem;
            --fs-h2 : 2.25rem;
            --fs-h3 : 1.25rem;
            --fs-body : 1rem;

            --fw-reg : 300;
            --fw-bold : 900;

            --ff-family :  'sfmy-regular',sans-serif;
        }

        @media (min-width : 800px){
            :root{
                --fs-h1 : 4rem;
                --fs-h2 : 3.75rem;
                --fs-h3 : 1.5rem;
                --fs-body : 1.2rem;
            }
        }

        html{
            height: 100%;
        }

        body{
            display: flex;
            /* flex-direction: column; */
            justify-content: center;
            align-items: center;
            height: 100%;
            margin: 0;
            background: var(--clr-light);
            font-family: var(--ff-family);
            font-size: var(--fs-body);
            line-height: 1.5;
        }

        /*control images*/
        img{
            display: block;
            max-width: 100%;
        }

        h1 { font-size: var(--fs-h1);}
        h2 {font-size: var(--fs-h2);}
        h3 {font-size: var(--fs-h3);}

        /*button decoration*/
        .btn{
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            /* margin-left: 0%; */
            text-decoration: none;
            width: 90px;
            height: 35px;
            color: white;
            background: black;
            border-radius: 13px;
            font-weight: var(--fw-bold);
            letter-spacing: 1px;

            transition: 500ms;
        }

        .btn:hover{
            transform: scale(1.1);
        }

        /*forget text*/
        .forgetText{
            margin-top: 2%;
        }


        /*image decoration*/
        .imglogo{
            transition: 800ms;
        }
        .imglogo:hover{
            transform: scale(1.5);
        }


        /* If we get and invalid input then need to indicate error decoration
        */
        .box{
            display: flex;
            flex-direction: column;
            justify-content: start;
            align-items: center;
            margin-top: 4%;
            /* height: 100vh; Optional: Set the container to fill the viewport */
        }

        .box__title{
            font-size: var(--fs-h3);
            margin: 2%;
        }

        .box__image{
            width: 25%;
            height: 25%;
            /* background-color:var(--clr-dark); */
            border-radius: 16px;
        }

        .box__goBack_button{
            margin: 3%;
        }
    </style>
    
</head>
<body>
    <div class="box">
        <div class="box__title">
            Thank you for joining BIKEABLE!
        </div>
        <div class="box__image">
            <img src="<?php echo URLROOT;?>/public/images/z_bikableLogo/logo.png" alt="BikableLogo" class="serverImage">
        </div>
        <div class="box__goBack_button">
            <a href="<?php echo URLROOT;?>/users/login" class="btn">Login</a>
        </div>
    </div>
    
</body>
</html>