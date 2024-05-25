<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>  
<head>
    <meta charset="UTF-8">
    <title> Pendaftaran Akun </title>
    <!-- my style -->
    <style>
        /* Google Font Link */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            /* background: #7d2ae8; */
            padding: 30px;
            background-image: url("assets/img/beranda.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        .container {
            width: 400px;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(9px);
            -webkit-backdrop-filter: blur(9px);
        }

        .forms {
            display: flex;
            flex-direction: column;
        }

        .title {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #fff;
        }

        .input-box {
            position: relative;
            border-bottom: 2px solid #ccc;
            margin: 15px 0;
        }

        .input-box ::placeholder {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            color: #fff;
            font-size: 16px;
            pointer-events: none;
            transition: 0.15s ease;
        }

        .input-box input {
            width: 100%;
            height: 40px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 16px;
            color: #fff;
        }
        
        .container a {
            color: #efefef;
            text-decoration: none;
        }

        .container a:hover {
            text-decoration: underline;
        }

        .form-content .button input {
            background: #fff;
            color: #000;
            font-weight: 600;
            border: none;
            padding: 17px 42%;
            cursor: pointer;
            border-radius: 3px;
            font-size: 16px;
            border: 2px solid transparent;
            transition: 0.3s ease;
        }

        .form-content .button input:hover {
            color: #fff;
            border-color: #fff;
            background: rgba(255, 255, 255, 0.15);
        } 

        .login {
            text-align: center;
            margin-top: 30px;
            color: #fff;
        }

        .warning {
            color: whitesmoke;
        }

    </style>
</head>
<body>
<div class="container">
        <div class="forms">
            <div class="form-content">
                <div class="title">Pendaftaran Akun</div>
                <?php echo form_open('register');?>
                <div class="input-boxes">
                    <div class="input-box">
                        <input type="text" name="name" placeholder="Nama" value="<?php echo set_value('name'); ?>"/>
                    </div>
                    <p> <?php echo form_error('name'); ?> </p>
                    <div class="input-box">
                        <input type="text" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>"/>
                    </div>
                    <p> <?php echo form_error('username'); ?> </p>
                    <div class="input-box">
                        <input type="text" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>"/>
                    </div>
                    <p> <?php echo form_error('email'); ?> </p>
                    <div class="input-box">
                        <input type="password" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>"/>
                    </div>
                    <p> <?php echo form_error('password'); ?> </p>
                    <div class="input-box">
                        <input type="password" name="password_conf" placeholder="Password Confirm" value="<?php echo set_value('password_conf'); ?>"/>
                    </div>
                    <p> <?php echo form_error('password_conf'); ?> </p>
                    <div class="button">
                        <input type="submit" name="btnSubmit" value="Daftar" />
                    </div>
                </div>
                <?php echo form_close();?>
                <div class="login">
                    <p>already have an account? <a href="<?php echo base_url().'login'?>">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>