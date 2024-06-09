<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jual Beli Motor</title>

    @vite('resources/css/app.css')

</head>

<body class="bg-[linear-gradient(90deg,_#28166F_-7.73%,_#4D2AD5_146.24%)]">
    <div class="w-full flex items-center justify-center h-screen">
        <div class=" lg:flex w-full lg:border-4 lg:w-[45%] rounded-xl ">
            <img class="rounded-lg hidden lg:block" src="img/login.png" alt="">
            <div class="bg-white w-10/12 mx-auto rounded-xl flex flex-col p-6 md:py-12">
                <form action="/" method="post">
                    @csrf
                    <h1 class="text-3xl md:text-4xl font-bold">Login</h1>
                    <h2 class="text-md md:text-xl py-2 md:my-4 font-semibold">Masuk dan jelajahilah <span class="bg-[linear-gradient(90deg,_#28166F_-7.73%,_#4D2AD5_146.24%)] inline-block text-transparent bg-clip-text">AsiaMotor!</span></h2>

                    @if (session()->has('loginError'))
                    <div class="text-red-600 text-sm md:text-lg" role="alert">
                        {{ session("loginError") }}
                    </div>
                    @endif

                    @if (session()->has('success'))
                    <div class="text-red-600 text-sm md:text-sm" role="alert">
                        {{ session("success") }}
                    </div>
                    @endif

                    <div class="flex flex-col">
                        <h2 class="text-base md:text-xl">Username</h2>
                        <input type="text" name="username" class="p-2 py-3 border-2 w-full text-xs rounded-lg mt-2 md:my-2 border-[#28166F] md:text-[14px]" placeholder="Masukkan Username Anda">
                    </div>
                    <div class="flex flex-col">
                        <h2 class="text-base md:text-xl">Password</h2>
                        <input type="password" name="password" class="p-2 py-3 border-2 w-full text-xs rounded-lg mt-2 border-[#28166F] md:text-[14px] md:my-2" placeholder="Masukkan Password Anda">
                    </div>
                    <button type="submit" class="mt-4 py-2 w-full text-center border-2 rounded-full border-[#28166F] hover:text-white hover:bg-[linear-gradient(90deg,_#28166F_-7.73%,_#4D2AD5_146.24%)] md:mt-6">Masuk</button>
                </form>
                <div class="w-11/12 mt-6 mx-auto h-[2px] bg-[linear-gradient(90deg,_#28166F_-7.73%,_#4D2AD5_146.24%)] mt-4"></div>
                <p class="text-xs text-center mt-4 md:text-lg">Belum Memiliki Akun? <a href="/daftar" class="text-blue-400">Daftar disini!</a></p>
            </div>
        </div>
    </div>
</body>

</html>