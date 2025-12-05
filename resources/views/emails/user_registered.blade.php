<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to LMS</title>
    <style>
        body, table, td, p, a, li {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }
        img {
            display: inline-block; 
            vertical-align: middle; 
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f6f8; font-family: Arial, sans-serif; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                    <tr>
                        <td align="center" style="padding: 30px 40px 20px;">
                            <div style="font-size: 40px; color: #0d6efd; font-weight: bold; margin-bottom: 15px;">
                                LMS
                            </div>
                            <h1 style="margin: 0; font-size: 24px; color: #333333; font-weight: bold;">Welcome, {{ $user->name }}</h1>
                            <p style="margin: 8px 0 0; font-size: 16px; color: #555555;">Your registration to LMS is successful!</p>
                             @if(!empty($user->enrollment_no))
                                <h1 style="margin: 0; font-size: 24px; color: #333333; font-weight: bold;">
                                    Your Enrollment no:
                                </h1>
                                <p style="margin: 8px 0 0; font-size: 16px; color: #555555;">
                                    {{ $user->enrollment_no }}
                                </p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 0 40px 30px;">
                            <div style="font-size: 80px; line-height: 1; color: #0d6efd; margin-bottom: 20px;">
                                &#9993; </div>
                            <p style="font-size: 16px; color: #333; line-height: 1.6; margin-bottom: 20px;">
                                Your account has been created. You can now log in and start using the LMS.
                            </p>
                            <a href="{{ url('/') }}" style="background-color: #0d6efd; color: white; padding: 12px 24px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block; font-size: 16px;">
                                Access LMS
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 20px 40px; background-color: #ffffff;">
                            <p style="margin-bottom: 15px; text-align: center;">
                                <a href="#" style="margin: 0 8px;"><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" width="24" height="24" alt="Facebook"></a>
                                <a href="#" style="margin: 0 8px;"><img src="https://cdn-icons-png.flaticon.com/512/733/733561.png" width="24" height="24" alt="LinkedIn"></a>
                                <a href="#" style="margin: 0 8px;"><img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" width="24" height="24" alt="Twitter"></a>
                            </p>
                            <div style="font-size: 20px; color: #333333; font-weight: bold; margin: 0 auto 10px;">
                                LMS
                            </div>
                            <p style="font-size: 12px; color: #999; margin: 0;">&copy; {{ date('Y') }} LMS. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>