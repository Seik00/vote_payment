<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('sys_config.project_name') }} </title>

  <!-- App favicon -->
  <link rel="shortcut icon" href="{{asset( config('sys_config.icon')) }}">

  <link rel="stylesheet" href="/css/Parisine Bold.otf" />
  <link rel="stylesheet" href="/css/Parisine Regular.otf" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <style>
    .animated-progress {
      width: 100%;
      height: 30px;
      margin: auto;
      margin-bottom: 20px;
      border: 1px solid rgb(33 95 138);
      overflow: hidden;
      position: relative;
      border-radius: 25px;
      background-color: #1d2732;
    }

    .animated-progress span {
      height: 100%;
      display: block;
      width: 0;
      color: black;
      font-weight: bold;
      line-height: 30px;
      position: absolute;
      text-align: end;
      padding-right: 5px;
    }

    .progress-green span {
      background-image: linear-gradient( 90deg, #008CF9 0%, #00FFFF 100% );
    }
    .progress-purple span {
      background-color: #949494;
    }
   
  </style>
  <style>
    * {
      box-sizing: border-box;
    }
    @font-face {
      font-family: 'Parisine';
      src: url('/css/Parisine Regular.otf');
    }

    @font-face {
      font-family: 'Parisine';
      font-weight: bold;
      src: url('/css/Parisine Bold.otf');
    }
    body {
      margin: 0;
      padding: 0;
      font-family: 'Parisine';
      background-color: #020710;
      color: #b9e5ff;
      overflow-y: scroll;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding:  20px;
    }

    .logo {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .logo img {
      height: 130px;
      margin-right: 10px;
    }

    .countdown {
      text-align: center;
      margin-bottom: 30px;
    }

    .countdown-timer {
      font-size: 40px;
      font-weight: bold;
      animation: pulse 1s infinite;
      background-image: linear-gradient( 90deg, #008CF9 0%, #00FFFF 100% );
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .form-container {
      width: 100%;
      max-width: 600px;
      padding: 20px;
      border: 1px solid rgb(0, 26, 44);
      border-radius: 15px;
      margin-bottom: 30px;
      background: rgb(0, 26, 44);
      overflow-y: auto;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 25px;
      font-weight: bold;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius:25px;
      font-size: 16px;
    }

    .form-group button {
      padding: 10px 20px;
      background-image: linear-gradient( 90deg, #008CF9 0%, #00FFFF 100% );
      color: #fff;
      border: none;
      border-radius: 25px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      width: 100%;
    }

    td.cell2 {
      text-align:right;
    }

    .table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 30px;
    }

    .table th, .table td {
      padding: 15px;
      border-bottom: 1px solid #5b5a5a;
    }

    .table th {
      font-weight: bold;
      text-align: left;
    }

    .particles-js-canvas-el {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
    }

    .checkmark {
      display: inline-block;
      padding: 6px;
      border-radius: 50%;
      background-image: linear-gradient( 90deg, #008CF9 0%, #00FFFF 100% );
      margin-left: 5px; /* 调整勾的位置 */
    }

    .checkmark i {
      color: white; /* 勾的颜色 */
    }


    input#wallet-address{
      border-radius: 25px;
    }

    @keyframes pulse {
      0% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.1);
      }
      100% {
        transform: scale(1);
      }
    }

    @media screen and (max-width: 768px) {
      .container {
        padding: 10px;
      }
      
    }
  </style>
  <style>
    .container-spe {
      max-width: 600px;
      margin: 0 auto;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .content {
      overflow: hidden;
      max-height: 162px;
      transition: max-height 0.3s ease;
    }

    .expanded {
      max-height: none;
    }

    .read-more {
      display: inline-block;
      padding: 8px 16px;
      background-image: linear-gradient( 90deg, #008CF9 0%, #00FFFF 100% );
      color: #fff;
      font-size: 14px;
      font-weight: bold;
      text-decoration: none;
      border-radius: 25px;
      transition: background-color 0.3s ease;
      margin-top:20px;
      width: 100%;
      text-align:center;
      padding: 10px 20px; 
    }

    .read-more:hover {
      background-color: #0056b3;
    }
  </style>
  <style>
    /* 模态框样式 */
    .modal {
      display: none; /* 默认隐藏 */
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4); /* 半透明背景 */
    }

    /* 模态框内容样式 */
    .modal-content {
      background: rgb(0, 26, 44);
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #141414;
      width: 50%;
      border-radius:25px;
    }

    @media screen and (max-width: 768px) {
      .modal-content {
        background: rgb(0, 26, 44);
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #141414;
        width: 80%;
        border-radius:25px;
      }
      
    }

    /* 模态框按钮样式 */
    .modal-buttons {
      text-align: center;
      margin-top: 20px;
    }

    .modal-buttons button {
      align-items: center;
      margin: 5px;
      padding: 10px 20px;
      border: none;
      border-radius: 25px;
      background-image: linear-gradient(90deg, #008CF9 0%, #00FFFF 100%);
      color: white;
      cursor: pointer;
      font-size: 16px;
      font-family: 'Parisine';
    }

    .modal-buttons button::before {
      content: "\2713"; /* Unicode 编码为勾的图标 */
      margin-right: 5px;
    }

    button#spec-d::before{
      content: "\2717"; /* Unicode 编码为勾的图标 */
      margin-right: 5px;
    }

    .modal-buttons button:hover {
      background-color: #45a049;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropbtn {
      color: white;
      padding: 10px;
      font-size: 16px;
      border: none;
      cursor: pointer;
      border-radius: 10px;
      background-image: linear-gradient( 90deg, #008CF9 0%, #00FFFF 100% );
      width:160px;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: rgb(0, 26, 44);
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
      color:white;
      width: 100%;
    }

    .dropdown-content a {
      color: white;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: rgb(4, 53, 88);
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown:hover .dropbtn {
      width: 160px;
      background-color: rgb(4, 53, 88);
    }

  </style>

  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>



  <script>
    function toggleContent() {
      const content = document.getElementById("content");
      const expandButton = document.getElementById("expandButton");

      if (content.classList.contains("expanded")) {
        content.classList.remove("expanded");
        expandButton.textContent = "{{ __('site.read_more') }}";
      } else {
        content.classList.add("expanded");
        expandButton.textContent = "{{ __('site.read_less') }}";
      }
    }
  </script>

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="path/to/jquery.min.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script src="path/to/sweetalert.min.js"></script>
 
 
   <script>

document.addEventListener("DOMContentLoaded", function() {

    var countdownDate;
    var voteEnd;

      $(document).ready(function() {
        $.get("/api/global/get_user_info", function(data) {
        
          if(data.code==1){
            document.getElementById("vote_button").style.background = "#585858";
            document.getElementById("vote_button").innerHTML  = "{{ __('site.vote_close') }}";
            document.getElementById("vote_button").disabled = true;
          }

          countdownDate = new Date(data.data.start_time);
          voteEnd = new Date(data.data.end_time);
          
        });
		  });

      particlesJS('particles-js', {
        particles: {
          number: {
            value: 50,
            density: {
              enable: true,
              value_area: 800
            }
          },
          color: {
            value: '#ffffff'
          },
          shape: {
            type: 'circle',
            stroke: {
              width: 0,
              color: '#000000'
            },
            polygon: {
              nb_sides: 5
            },
            image: {
              src: 'img/github.svg',
              width: 100,
              height: 100
            }
          },
          opacity: {
            value: 0.5,
            random: false,
            anim: {
              enable: false,
              speed: 1,
              opacity_min: 0.1,
              sync: false
            }
          },
          size: {
            value: 3,
            random: true,
            anim: {
              enable: false,
              speed: 40,
              size_min: 0.1,
              sync: false
            }
          },
          line_linked: {
            enable: true,
            distance: 150,
            color: '#ffffff',
            opacity: 0.4,
            width: 1
          },
          move: {
            enable: true,
            speed: 6,
            direction: 'none',
            random: false,
            straight: false,
            out_mode: 'out',
            bounce: false,
            attract: {
              enable: false,
              rotateX: 600,
              rotateY: 1200
            }
          }
        },
        interactivity: {
          detect_on: 'canvas',
          events: {
            onhover: {
              enable: true,
              mode: 'repulse'
            },
            onclick: {
              enable: true,
              mode: 'push'
            },
            resize: true
          },
          modes: {
            grab: {
              distance: 400,
              line_linked: {
                opacity: 1
              }
            },
            bubble: {
              distance: 400,
              size: 40,
              duration: 2,
              opacity: 8,
              speed: 3
            },
            repulse: {
              distance: 200,
              duration: 0.4
            },
            push: {
              particles_nb: 4
            },
            remove: {
              particles_nb: 2
            }
          }
        },
        retina_detect: true
      });

      const countdownElement = document.querySelector('.countdown-timer');
   

      function updateCountdown() {
        const timestamp = new Date().toLocaleString("en-US", { timeZone: "Asia/Kuala_Lumpur" });

        const now = new Date(timestamp).getTime();
        const distance = countdownDate - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        countdownElement.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;

        if (distance < 0) {

          distanceEnd = voteEnd - now;

          days2 = Math.floor(distanceEnd / (1000 * 60 * 60 * 24));
          hours2 = Math.floor((distanceEnd % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          minutes2 = Math.floor((distanceEnd % (1000 * 60 * 60)) / (1000 * 60));
          seconds2 = Math.floor((distanceEnd % (1000 * 60)) / 1000);

          countdownElement.innerHTML = `${days2}d ${hours2}h ${minutes2}m ${seconds2}s`;

          document.getElementById("vote_text").innerHTML = "{{ __('site.cast_vote') }}";

          if(distanceEnd < 0){
            countdownElement.innerHTML = "{{ __('site.vote_end') }}";
            document.getElementById("vote_text").style.display = "none";
          }
        }
      }

      setInterval(updateCountdown, 1000);

      var previousData = []; // 用于存储之前加载的数据

      function loadEverySecond() {
        var tableBody = document.getElementById("tableBody");
        var totalVote;
        var totalAgree;
        var totalDisagree;
        $.get("/api/global/users_voted", function(data) {
          totalVote = 180;
          totalAgree = data.voted.agree;
          totalDisagree = data.voted.disagree;
         

          var a = (totalAgree / totalVote) * 100;

          var progressBar = document.getElementById("ag"); // 获取进度条元素
          progressBar.setAttribute("data-progress", a); // 设置 data-progress 属性
          progressBar.style.width = a + "%"; 

          var b = (totalDisagree / totalVote) * 100;

          var progressBar2 = document.getElementById("disag"); // 获取进度条元素
          progressBar2.setAttribute("data-progress", b); // 设置 data-progress 属性
          progressBar2.style.width = b + "%"; 

          document.getElementById("agree_amount").innerHTML = a.toFixed(4) + "%"; 
          document.getElementById("disagree_amount").innerHTML = b.toFixed(4) + "%"; 

          if (data.voted.length == 0) {
            document.getElementById("vote_table").style.display = "none";
          }

          // 检查新数据与之前数据是否相同
          if (!arraysEqual(data.voted.user_data, previousData)) {
            // 清空表格
            tableBody.innerHTML = "";

            // 添加新数据到表格
            for (var i = 0; i < data.voted.user_data.length; i++) {
              var text = data.voted.user_data[i].username;
              var shortenedText = text.substring(0, 5) + "....." + text.substring(text.length - 3);
              
              var row = document.createElement("tr");
              
              var cell1 = document.createElement("td");
              cell1.textContent = text;
              row.appendChild(cell1);

              var cell2 = document.createElement("td");
              cell2.className = "cell2";

              var votedText = document.createElement("span");
              votedText.innerText = "Voted";
              cell2.appendChild(votedText);

              var checkmark = document.createElement("span");
              checkmark.className = "checkmark";
              checkmark.innerHTML = '<i class="fas fa-check"></i>'; // 添加带有 Font Awesome 图标的元素
              cell2.appendChild(checkmark);

              row.appendChild(cell2);
              tableBody.appendChild(row);

            }
          }

          // 更新之前的数据
          previousData = data.voted;
        });

        $(".animated-progress span").each(function () {
          $(this).animate(
            {
              width: $(this).attr("data-progress") *2 + "%",
            },
            1000
          );
          // $(this).text($(this).attr("data-progress") + "%");
        });
      }

      // 比较两个数组是否相同
      function arraysEqual(arr1, arr2) {
        if (arr1.length !== arr2.length) return false;
        for (var i = 0; i < arr1.length; i++) {
          if (arr1[i] !== arr2[i]) return false;
        }
        return true;
      }

      setInterval(loadEverySecond, 1000);


    });


      $(document).ready(function() {
        var tableBody = document.getElementById("tableBody");

        $.get("/api/global/users_voted", function(data) {

          if(data.voted.user_data.length == 0){
           document.getElementById("vote_table").style.display = "none";
          }
          for (var i = 0; i < data.voted.user_data.length; i++) {
           
            
            var text = data.voted.user_data[i].username;
      
            var shortenedText = text.substring(0, 5) + "....." + text.substring(text.length - 3);
            
            var row = document.createElement("tr");
            
            var cell1 = document.createElement("td");
            cell1.textContent = text;
            row.appendChild(cell1);
            
            var cell2 = document.createElement("td");
            cell2.className = "cell2";
            var checkmark = document.createElement("span");
            checkmark.className = "checkmark";
            // cell2.appendChild(checkmark);
            cell2.innerHTML += "Voted"; 
            row.appendChild(cell2);
            
            tableBody.appendChild(row);
            
          }
        });
		  });

     function submit_request(vote_status) {
        var lang = document.documentElement.lang;
         $.ajax({
             type: "POST",
             data: {
                 username: document.getElementById("wallet_address").value,
                 vote_status: vote_status,
                 language: lang,
             },
             url: "/api/global/vote",
             success: function(result){
                 
                 var data = JSON.parse(JSON.stringify(result));
                 console.log(data);
                 if (data.code == 0){
                     swal({
                         title: "{{ __('site.vote_success') }}",
                        //  text: "Success!",
                         icon: "success"
                     })
                     .then((reload) => {
                         if(reload){
                         location.reload();
                         }
                     });
                     
                 }
                 else{
                     swal({
                         title: data.message,
                         timer: 2500,
                         icon: "error",
                         showConfirmButton: false
                     });
                 }
             }
                 
         });
     }
     
     </script>
     <script>
      // 打开模态框
      function openModal() {
        if(document.getElementById("wallet_address").value == ''){
          swal({
              title: "{{ __('site.please_enter_wallet_address') }}",
              timer: 2500,
              icon: "error",
              showConfirmButton: false
          });
        }else{
          var modal = document.getElementById("myModal");
          modal.style.display = "block";
        }
        
      }

      // 点击 Agree 按钮
      function agree() {
        submit_request(1);
        closeModal();
      }

      // 点击 Disagree 按钮
      function disagree() {
        submit_request(2);
        closeModal();
      }

      // 关闭模态框
      function closeModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
      }
    </script>
</head>
<body>
  <div id="particles-js" class="particles-js-canvas-el"></div>


  
  <div class="container">
    <div style="width: 100%;max-width: 600px;padding: 20px;text-align: end;margin-bottom: 30px;">
      <div class="dropdown">
        <button class="dropbtn">{{ __('site.Language') }}</button>
        <div class="dropdown-content">
          <a href="/lang/en">English</a>
          <a href="/lang/cn">中文</a>
        </div>
      </div>
    </div>
  

    <div class="logo">
      <img src="{{asset( config('sys_config.icon')) }}" alt="Logo">
    </div>

    <div class="countdown">
      <div class="countdown-timer"></div>
      <p id="vote_text">{{ __('site.coming_soon') }}</p>
    </div>

   
    
    <div class="form-container">asas
    @if(session('message'))
    <div class="alert alert-success">
        123
    </div>
    @endif
      <div class="container-spe">
        <h1>{{ __('site.content_title') }}</h1>

        <div id="content" class="content">
          <p>{{ __('site.content_benefits') }}</p>

          <ul>
            <li>{{ __('site.content_benefits_1') }}</li>
            <li>{{ __('site.content_benefits_2') }}</li>
            <li>{{ __('site.content_benefits_3') }}</li>
            <li>{{ __('site.content_benefits_4') }}</li>
            <li>{{ __('site.content_benefits_5') }}</li>
            <li>{{ __('site.content_benefits_6') }}</li>
            <li>{{ __('site.content_benefits_7') }}</li>
          </ul>

          <p>{{ __('site.content_agree') }}</p>
          <p>
            {{ __('site.hashtag_1') }}<br/>
            {{ __('site.hashtag_2') }}<br/>
            {{ __('site.hashtag_3') }}<br/>
            {{ __('site.hashtag_4') }}<br/>
            {{ __('site.hashtag_5') }}<br/>
            {{ __('site.hashtag_6') }}<br/>
            {{ __('site.hashtag_7') }}<br/>
            {{ __('site.hashtag_8') }}<br/>
            {{ __('site.hashtag_9') }}<br/>
            {{ __('site.hashtag_10') }}<br/>
            {{ __('site.hashtag_11') }}<br/>
            {{ __('site.hashtag_12') }}<br/>
            {{ __('site.hashtag_13') }}<br/>
            {{ __('site.hashtag_14') }}<br/>
            {{ __('site.hashtag_15') }}<br/>
            {{ __('site.hashtag_16') }}<br/>
            {{ __('site.hashtag_17') }}<br/>
            {{ __('site.hashtag_18') }}<br/>
            {{ __('site.hashtag_19') }}<br/>
            {{ __('site.hashtag_20') }}<br/>
            {{ __('site.hashtag_21') }}<br/>
            {{ __('site.hashtag_22') }}<br/>
            {{ __('site.hashtag_23') }}<br/>
            {{ __('site.hashtag_24') }}<br/>
          </p>
        </div>

        <a id="expandButton" class="read-more" onclick="toggleContent()" href="javascript:void(0)">{{ __('site.read_more') }}</a>
      </div>
    </div>

    <div class="form-container">
      <div class="form-group">
        <label for="wallet-address">{{ __('site.cast_vote') }}</label>
        <input type="text" id="wallet_address" placeholder="{{ __('site.enter_id') }}">
      </div>

      <div class="form-group">
        <button id="vote_button" type="button" onclick="openModal()">{{ __('site.vote') }}</button>
      </div>
    </div>

    <div class="form-container" id="vote_table">
      <div class="logo" style="text-align:center">
        <img src="{{asset( config('sys_config.word_icon')) }}" alt="Logo" style="margin: auto;width: 180px;height: 50px;margin-bottom: 20px;margin-top: 20px;}">
      </div>
      <!--Start Animated Progress Bar-->
        <h4>{{ __('site.vote_result') }}</h4>
        <div style="display: flex; align-items: center;">
          <label for="wallet-address" style="margin-bottom: 20px; display: inline">{{ __('site.agree') }}</label>
          <h5 id="agree_amount" style="margin-left: auto;"></h5>
        </div>

        <div class="animated-progress progress-green">
          <span id="ag" data-progress=""></span>
        </div>
       
        <div style="display: flex; align-items: center;">
          <label for="wallet-address" style="margin-bottom: 20px; display: inline">{{ __('site.disagree') }}</label>
          <h5 id="disagree_amount" style="margin-left: auto;"></h5>
        </div>

        <div class="animated-progress progress-purple">
          <span id="disag" data-progress=""></span>
        </div>
        
      <!--End Animated Progress Bar-->

    </div>

    <div class="form-container" id="vote_table">
      <table class="table">
        <thead>
          <tr>
            <th>{{ __('site.users_id') }}</th>
            <th style="text-align:right;">{{ __('site.status') }}</th>
          </tr>
        </thead>
        <tbody id="tableBody">
          <!-- <tr>
            <td id="output"></td>
            <td><span class="checkmark"></span>Voted</td>
          </tr> -->
        </tbody>
      </table>
    </div>

    <div id="myModal" class="modal" onclick="closeModal(event)">
      <div class="modal-content">
        <h2 style="text-align:center;">{{ __('site.vote_box_content_title') }}</h2>
        <h3 style="text-align:center;margin-bottom:50px;">{{ __('site.vote_box_content') }}</h3>
       
        <div class="modal-buttons">
          <button onclick="agree()" style="">{{ __('site.agree') }}</button>
          <button onclick="disagree()" id="spec-d" style="background-image:linear-gradient( 90deg, #2a4458 0%, #152626 100% )">{{ __('site.disagree') }}</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
