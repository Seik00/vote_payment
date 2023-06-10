<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: rgb(31, 31, 35);
      color: #fff;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    .logo {
      display: flex;
      align-items: center;
    }

    .logo img {
      height: 30px;
      margin-right: 10px;
    }

    .countdown {
      text-align: center;
      margin: 30px 0;
    }

    .countdown-timer {
      font-size: 40px;
      font-weight: bold;
    }

    .wallet-form {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .wallet-input {
      flex: 1;
      padding: 10px;
      border: none;
      border-radius: 4px;
      font-size: 16px;
    }

    .wallet-button {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
    }

    .table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 30px;
    }

    .table th, .table td {
      padding: 10px;
      border: 1px solid #ccc;
    }

    .table th {
      background-color: #f0f0f0;
      font-weight: bold;
    }

    .atom {
      width: 100px;
      height: 100px;
      background-color: #007bff;
      border-radius: 50%;
      position: relative;
      animation: atom-spin 2s linear infinite;
      margin: 0 auto;
      margin-bottom: 30px;
    }

    @keyframes atom-spin {
      0% { transform: rotate(0); }
      100% { transform: rotate(360deg); }
    }

    @media screen and (max-width: 768px) {
      .container {
        padding: 10px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="logo">
      <img src="logo.png" alt="Logo">
      <h1>Logo</h1>
    </div>

    <div class="countdown">
      <div class="countdown-timer">00:00:00</div>
      <p>Countdown Timer</p>
    </div>

    <form class="wallet-form">
      <input type="text" class="wallet-input" placeholder="Enter wallet address">
      <button type="submit" class="wallet-button">Submit</button>
    </form>

    <table class="table">
      <thead>
        <tr>
          <th>Header 1</th>
          <th>Header 2</th>
          <th>Header 3</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Data 1</td>
          <td>Data 2</td>
          <td>Data 3</td>
        </tr>
        <tr>
          <td>Data 4</td>
          <td>Data 5</td>
          <td>Data 6</td>
        </tr>
      </tbody>
    </table>

    <div class="atom"></div>
  </div>
</body>
</html>
