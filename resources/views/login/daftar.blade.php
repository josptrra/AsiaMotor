<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Akun</title>
</head>
@vite('resources/css/app.css')

<body class="bg-blue-300">
  <div class="w-full flex items-center justify-center h-screen">
    <div class=" lg:flex w-full lg:border-4 lg:w-[45%] rounded-xl border-[#28166F]">
      <img class="rounded-lg hidden lg:block" src="img/login.png" alt="">
      <div class="bg-white w-10/12 mx-auto rounded-xl flex flex-col p-6 md:py-12 ">
        <form action="/daftar" method="post">
          @csrf
          <h1 class="text-3xl md:text-4xl font-bold">Daftar</h1>
          <h2 class="text-md md:text-xl py-2 md:my-4 font-semibold">Registrasi dan jelajahilah <span class="bg-[linear-gradient(90deg,_#28166F_-7.73%,_#4D2AD5_146.24%)] inline-block text-transparent bg-clip-text">AsiaMotor!</span></h2>
          <div class="flex flex-col">
            <h2 class="text-base md:text-xl">Nama</h2>
            <input type="text" name="name" class="p-2 py-3 border-2 w-full text-xs rounded-lg my-2 md:my-2 border-[#28166F] md:text-[14px]" placeholder="Masukkan Nama Lengkap Anda">
          </div>
          <div class="flex flex-col">
            <h2 class="text-base md:text-xl">Username</h2>
            <input type="text" name="username" class="p-2 py-3 border-2 w-full text-xs rounded-lg my-2 md:my-2 border-[#28166F] md:text-[14px]" placeholder="Masukkan Username Anda">
          </div>
          <div class="flex flex-col">
            <h2 class="text-base md:text-xl">Password</h2>
            <input type="password" name="password" class="p-2 py-3 border-2 w-full text-xs rounded-lg my-2 border-[#28166F] md:text-[14px] md:my-2" placeholder="Masukkan Password Anda">
          </div>
          <button type="submit" class="mt-4 py-2 w-full text-center border-2 rounded-full border-[#28166F] hover:text-white hover:bg-[linear-gradient(90deg,_#28166F_-7.73%,_#4D2AD5_146.24%)] md:mt-6">Daftar</button>
        </form>
        <div class="w-11/12 mt-6 mx-auto h-[2px] bg-[linear-gradient(90deg,_#28166F_-7.73%,_#4D2AD5_146.24%)] mt-4"></div>
        <p class="text-xs text-center mt-4 md:text-lg">Sudah Memiliki Akun? <a href="/" class="text-blue-600">Masuk disini!</a></p>
      </div>
    </div>
  </div>
</body>

</html>