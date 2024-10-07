<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Spin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="x-icon" href="src/assets/favicon.ico">
</head>

<body>
    <div class="w-screen min-h-screen flex items-center justify-center bg-gray-50 px-4 sm:px-6 lg:px-8">
        <div class="relative py-3 sm:max-w-xs sm:mx-auto">
            <form action="./app/controller/post-login.php" method="POST">
                <div class="min-h-96 px-8 py-6 mt-4 text-left bg-white  rounded-xl shadow-lg">
                    <div class="flex flex-col justify-center items-center h-full select-none">
                        <div class="flex flex-col items-center justify-center gap-2 mb-8">
                            <a href="" target="_blank">
                                <img src="./src/assets/logo.png" class="w-8" />
                            </a>
                            <p class="m-0 text-[16px] font-semibold ">Login to your Account</p>
                            <span class="m-0 text-xs max-w-[90%] text-center text-[#8B8E98]">Get started with our app,
                                give the wheel a spin and enjoy the exciting experience!.
                            </span>
                        </div>
                        <div class="w-full flex flex-col gap-2">
                            <label class="font-semibold text-xs text-gray-400 ">Username</label>
                            <input class="border rounded-lg px-3 py-2 mb-5 text-sm w-full outline-none y-500"
                                name="username" placeholder="Username" />
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-2">
                        <label class="font-semibold text-xs text-gray-400 ">Password</label>
                        <input type="password" name="password"
                            class="border rounded-lg px-3 py-2 mb-5 text-sm w-full outline-none y-500"
                            placeholder="••••••••" />
                    </div>
                    <div className="mt-5">
                        <button type="submit"
                            class="py-1 px-8 bg-blue-500 hover:bg-blue-800 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg cursor-pointer select-none">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>

</html>