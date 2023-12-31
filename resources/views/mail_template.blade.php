<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{!! $details['title'] !!}</title>
  <style type="text/css">
    body {
      margin: 0;
      padding: 0;
      min-width: 100% !important;
      font-family: 'Helvetica', sans-serif;
    }

    .header {
      width: 100%;
      max-width: 600px;
    }
  </style>
</head>

<body style="margin: 0; padding: 0; min-width: 100% !important; font-family: 'Helvetica', sans-serif;">
  <!--[if (gte mso 9)|(IE)]>
    <table width="600" align="center" cellpadding="0" cellspacing="0" border="0" role="presentation">
      <tr>
        <td>
  <![endif]-->
  <table width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation">
    <tr>
      <td style="padding-left: 30px;">
        <table class="header" bgcolor="#001321" style="border-radius: 15px; background-color: #001321;" align="center" cellpadding="0" cellspacing="0" border="0" role="presentation">
          <tr>
            <td style="padding: 50px; text-align: center; border-radius: 15px 15px; background-color: #001321;">
              <img src="{{url(asset( config('sys_config.icon_email'))) }}" alt="Rifineria" style="width:180px;height:180px;">
              <table border="0" cellpadding="0" cellspacing="0" width="90%" style="margin-left: auto; margin-right: auto;">
                {!! $details['body'] !!}
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <!--[if (gte mso 9)|(IE)]>
    </td>
    </tr>
  </table>
  <![endif]-->
</body>


</html>
