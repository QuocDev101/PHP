<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- @vite('resources/css/app.css') --}}
</head>
<body>
    
      <div className="flex items-center justify-center">
        <div className="container flex justify-center items-center h-[600px] w-[800px] bg-white absolute right-1/5 top-[60px] shadow-lg rounded-2xl">
          <form className="sign-up ml-[50px] flex-1"  action="{{route('login')}}" method="POST">
            <div className="word-main text-[40px] mt-[50px] ml-20 mb-[50px]">
              <strong>Log In</strong>
            </div>
            <div className="user flex items-center mb-[20px] mt-[20px]">
              <FaUser />
              <input
                id="usernameInput"
                type="text"
                placeholder="Your Email"
                name="email"
                {{-- value={user.email} --}}
                {{-- onChange={handleChange} --}}
                className="form-control border-b-2 bottom-[30px] border-gray-300 p-[10px] w-[82%] bg-transparent transition duration-250 focus:outline-none focus:border-blue-500 border-none"
              />
            </div>
            <div className="pass flex items-center mb-[20px] mt-[20px]">
              <FaLock />
              <input
                id="passwordInput"
                type="password"
                placeholder="Password"
                name="password"
                {{-- value={user.password} --}}
                {{-- onChange={handleChange} --}}
                className="form-control border-b-2 bottom-[30px] border-gray-300 p-[10px] w-[82%] bg-transparent transition duration-250 focus:outline-none focus:border-blue-500 border-none"
              />
            </div>
            <div className="pass flex items-center mb-[20px] mt-[20px] text-sm hover:underline cursor-pointer">
              <a href="/ForgotPassword" className="hover:text-black">
                Forgot password?
              </a>
            </div>
            <div className="message text-red-500 border-none text-sm">
              {{-- {errors.email && <p className="text-red-500">{errors.email}</p>}
              {errors.password && (
                <p className="text-red-500">{errors.password}</p>
              )} --}}
            </div>
            <div className="button text-[16px] ml-4 mt-[20px]">
              <input id="agreeCheckbox" type="checkbox" className="" /> I agree
              all statements in
              <span className="underline ml-1">Term of service</span>
            </div>
            <button
              type="submit"
              className="register bg-yellow-500 border-none w-36 h-16 ml-[90px] mt-[60px] text-white text-lg font-semibold rounded-lg px-4 transition duration-300 hover:bg-black border-none"
            >
              Login
            </button>
          </form>

          {{-- <div className="image flex-1">
            <div className="flex justify-center">
              <GoogleLogin
                onSuccess={handleLoginSuccess}
                onError={handleLoginError}
              />
             
            </div>
            <div className="image-main">
              <img
                src="https://cdn.pixabay.com/photo/2024/02/19/02/02/meadows-8582365_1280.png"
                className="w-96 h-112"
                alt=""
              />
            </div>
            <div className="word mt-8 text-center">
              <a href="/resgister" className="underline">
                Register
              </a>
            </div>
          </div> --}}
        </div>
      </div>
</body>
</html>