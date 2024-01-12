<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Honda Civic</title>
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <meta name="viewprot" content="width=device-widht, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/takehometask.css') }}">
</head>
<body class="h-screen antialiased leading-none font-sans">
  <header class="bg-blue-900 py-6">
      <div class="container mx-auto flex justify-between items-center px-6">
          <div>
              <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                  {{ config('app.name', 'CIVIC') }}
              </a>
          </div>
          <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
              @guest
                  <a class="no-underline hover:underline text-gray-100 no-underline capitalize" href="{{ route('login') }}">{{ __('Login') }}</a>
                  @if (Route::has('register'))
                      <a class="no-underline hover:underline text-gray-100 no-underline capitalize" href="{{ route('register') }}">{{ __('Register') }}</a>
                  @endif
              @else
                  <span>{{ Auth::user()->name }}</span>

                  <a href="{{ route('logout') }}"
                      class="no-underline hover:underline"
                      onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                      {{ csrf_field() }}
                  </form>
              @endguest
          </nav>
      </div>
  </header>
  <div class="kontainer">
    <hero>
      <div class="image-container">
          <img src="img/estilo.jpg" alt="Foto 4">
          <img src="img/ferioit.jpg" alt="Foto 5">
          <img src="img/fd.jpg" alt="Foto 6">
      </div>
    </hero>
    <aside>
      <img style="height: 300px; width: 280px;" src="img/rs.jpg" alt=""/>
      <figcaption><b id="capture">Honda Civic Type R RS</b></figcaption>
    </aside>
    <main>
      <h1>The Generations Of <span class="spanstyle1"> Honda <a id="desc" style="cursor: pointer" href="">Civic</a></span></h1><br>
        <div id="civicParagraph" style="text-align: center; list-style: circle;"></div>
    </main>
    <footer>
      <div class="vote">
        <form action="process_rating.php" method="post">
          <label for="email">Email : </label>
          <input type="email" name="email" id="email" placeholder="praktikumweb@example.com">
          <br>
      
          <p><b>Menurut anda seberapa efektif web kami, tolong diisiya </b></p>
      
          <input type="radio" name="kindness" value="1" id="xl">
          <label for="xl">1</label>
          <input type="radio" name="kindness" value="2" id="xl">
          <label for="xl">2</label>
          <input type="radio" name="kindness" value="3" id="xl">
          <label for="xl">3</label>
          <input type="radio" name="kindness" value="4" id="xl">
          <label for="xl">4</label>
          <input type="radio" name="kindness" value="5" id="xs">
          <label for="xs">5</label>
          <br>
          <button type="submit">Submit</button>
      </form>      
      </div>
    
      <div class="komen">
        <h4><br> Komentar dari BlogOtomotif saya :D, dari <i style="color: rgb(255, 0, 0);"> OtoWeb<b>!</i></h4>
        <div id="kotak-komentar"></div>
        <form>
          <table>
            <tr>
              <td>Tulis komentar:</td>
              <td><textarea id="komentar" cols="30" rows="5"></textarea></td>
            </tr>
            <tr>
              <td><button type="button" onclick="submitComment()">Submit</button></td>
              <td><input type="reset" value="Tidak Jadi"></td>
            </tr>
          </table>
        </form>
      </div>
    </footer>
  </div>
  <div id="fooAdmin" style="margin:0 auto; align-items:center;justify-content:center;display:flex;">
    <a href="/admin" style="text-decoration: none; ">
      <button style="display: inline-block;background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;margin:50px">
          Menuju ke Route CRUD
      </button>
    </a>
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var isiparagraf = document.querySelector("#civicParagraph");
      var tampilan = localStorage.getItem("tampilan");
      var civic = document.getElementById("desc");

      if (tampilan === "true") {
        isiparagraf.style.display = "block";
      } else {
        isiparagraf.style.display = "none";
      }

      civic.addEventListener("click", function (event) {
        event.preventDefault();
        isiparagraf.style.display = "block";
        if (isiparagraf.innerHTML.trim() === "") {
          isiparagraf.innerHTML = `
            <p>Honda Civic merupakan salah satu mobil legendaris di Indonesia, bahkan dunia. Sejak debutnya pada tahun 1970-an, Honda Civic telah membuktikan diri sebagai mobil kompak yang tak tertandingi hingga saat ini.
            Banyak hal yang menarik dari sejarah perkembangan mobil tersebut. Kemudian mobil tersebut terus berevolusi hingga sekarang sudah 11 generasi. Dari tadinya mobil kecil hingga berubah jadi agak bongsor.
            Kini masuk di level sedan mengengah yang bersaing dengan Toyota Corolla Altis dan Mitsubishi Lancer</p>
            <div id="daftar-mobil" style="text-align:left;">
            <ul>
              <li><a href="/">Civic</a> </li>
              <li><a href="/Cikop">Civic Koper </a></li>
              <li><a href="cigendu.html">Civic Gen 2</a></li>
              <li><a href="ciwon.html">Civic Wonder</a></li>
              <li><a href="cinou.html">Civic Nouva</a></li>
              <li><a href="cigenstilo.html">Civic Genio & Estilo</a></li>
              <li><a href="cio.html">Civic Ferio</a></li>
              <li><a href="cies.html">Civic VTIS (ES)</a></li>
              <li><a href="emen.html">Civic FD</a></li>
              <li><a href="cibi.html">Civic FB</a></li>
              <li><a href="cibo.html">Civic Turbo</a></li>
              <li><a href="cirs.html">Civic RS</a></li>
            </ul>
            </div>
          `;
          localStorage.setItem("tampilan", "true");
        } else {
          isiparagraf.innerHTML = "";
          isiparagraf.style.display = "none";
          localStorage.setItem("tampilan", "false");
        }
      });
    });
  
    var comments = [];

    function submitComment() {
      var email = document.getElementById("email").value;
      var commentText = document.getElementById("komentar").value;

      var comment = {
        email: email,
        text: commentText,
      };
      comments.push(comment);

      displayComments();

      document.getElementById("email").value = "";
      document.getElementById("komentar").value = "";
    }

    function displayComments() {
      var kotakKomentar = document.getElementById("kotak-komentar");
      kotakKomentar.innerHTML = "";

      for (var i = 0; i < comments.length; i++) {
        var div = document.createElement("div");
        var emailElem = document.createElement("p");
        var textElem = document.createElement("p");

        emailElem.innerHTML = "<b>" + comments[i].email + "</b>";
        textElem.innerHTML = comments[i].text;

        div.appendChild(emailElem);
        div.appendChild(textElem);
        kotakKomentar.appendChild(div);
      }
    }
  </script>
</body>
</html>