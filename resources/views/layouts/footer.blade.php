
<footer class="p-2 bg-gray-100 sm:p-6 ">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <div class="flex lg:flex-row flex-col">
      <div class="flex flex-col lg:items-start items-center text-left px-6">
        <img src="{{ asset('images/logo.png') }}" alt="" class="w-40 h-40">
        <p class="text-center lg:text-left w-80 text-sm lg:ml-10 lg:mb-0 mb-5">Jl. Telekomunikasi No. 1, Terusan Buahbatu, Bojongsoang</p>
        <p class="text-center lg:text-left w-80 text-gray-400 text-xs lg:mt-4 lg:ml-10">Berdiri Sejak Tahun 2000</p>
      </div>

      <div class="grid grid-cols-1 gap-8 py-12 lg:grid-cols-3 justify-items-center lg:grow lg:px-0 px-6">
        <div>
            <h2 class="mb-6 text-sm font-bold text-orange-500 uppercase text-center">Quick Links</h2>
            <ul class="text-gray-500 dark:text-gray-400">
                <li class="mb-4 lg:text-left text-center">
                    <a href="{{route('home')}}" class="hover:text-orange-500">Home</a>
                </li>
                <li class="mb-4 lg:text-left text-center">
                    <a href="{{route('food.index')}}" class="hover:text-orange-500">Menus</a>
                </li>
                <li class="mb-4 lg:text-left text-center">
                    <a href="{{route('profile.edit')}}" class="hover:text-orange-500">Profile</a>
                </li>
            </ul>
        </div>

        <div>
          <h2 class="mb-6 text-sm font-bold text-orange-500 uppercase text-center">Support</h2>
          <ul class="text-gray-500 dark:text-gray-400">
              <li class="mb-4 lg:text-left text-center">
                  <a href="#" class="hover:text-orange-500">Privacy Policy</a>
              </li>
              <li class="mb-4 lg:text-left text-center">
                  <a href="#" class="hover:text-orange-500">Term Of Use</a>
              </li>
              <li class="mb-4 lg:text-left text-center">
                  <a href="#" class="hover:text-orange-500">FAQs</a>
              </li>
          </ul>
        </div>

        <div>
          <h2 class="mb-6 text-sm font-bold text-orange-500 uppercase text-center">Contact</h2>
          <ul class="text-gray-500 dark:text-gray-400">
              <li class="mb-4 lg:text-left text-center">
                  <a href="#" class="hover:text-orange-500">About Us</a>
              </li>
              <li class="mb-4 lg:text-left text-center">
                  <a href="#" class="hover:text-orange-500">Call Center </a>
              </li>
              <li class="mb-4 lg:text-left text-center">
                  <a href="#" class="hover:text-orange-500">Blog</a>
              </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
