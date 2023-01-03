<x-app-layout>
    <x-slot name="title">Home</x-slot>

    <x-slot name="hero">
        <div class="lg:w-1/3 leading-10 text-white mb-6">
            <h1 class="block text-6xl font-bold text-white mt-6 mb-4">Feel the taste of <span class="text-yellow-300 italic">Lamongan</span> food</h1> 
            <p class="w-96 text-lg">Food tasted better when you eat it with your family and friends</p>   
        </div>

        <div class="grid grid-cols-2 lg:w-1/4 gap-x-2.5 mb-6">
            <a href="/food" class="bg-red-600 rounded-lg px-6 py-3 shadow-md font-sans text-sm font-semibold text-white hover:opacity-50 text-center">View Menu</a>
            <a href="wa" class="bg-white rounded-lg px-6 py-3 shadow-md font-sans text-sm font-semibold text-red-600 hover:opacity-50 text-center">Online Order</a>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="superiority my-6 ">
            <div class="grid lg:grid-cols-2 items-center justify-items-center flex flex-col" >
                <div class="p-4 w-full">
                    <img src="{{ asset('images/hero/pasar.jpg') }}" class="rounded-lg object-cover h-80 w-full" alt="">
                </div>
                <div class="desc px-6 h-fit">
                    <h1 class="mb-3 font-bold text-3xl headings">High Quality Food Material</h1>
                    <p class="text-gray-400 pr-12" >Bahan makanan yang kurang segar dapat menyebabkan masalah kesehatan pada pelanggan Kami. Oleh karena itu, Kami memastikan semua bahan makanan yang Kami gunakan segar, yang nantinya untuk membuat makanan yang enak dan sehat bagi pelanggan Kami.</p>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 items-center justify-items-center flex flex-col" >
                <div class="p-4  w-full">
                    <img src="{{ asset('images/hero/menu.jpg') }}" class="rounded-lg object-cover h-80 w-full" alt="">
                </div>
                <div class="desc px-6 h-fit order-last lg:order-first">
                    <h1 class="mb-3 font-bold text-3xl headings">High Quality Food Material</h1>
                    <p class="text-gray-400 pr-12">Bahan makanan yang kurang segar dapat menyebabkan masalah kesehatan pada pelanggan Kami. Oleh karena itu, Kami memastikan semua bahan makanan yang Kami gunakan segar, yang nantinya untuk membuat makanan yang enak dan sehat bagi pelanggan Kami.</p>
                    
                </div>
            </div>
        </div>

        <div class="fav my-12">
            <h1 class="font-black text-3xl text-center">Categories Of Food</h1>
            <div class="grid lg:grid-cols-3 my-6 gap-y-6 justify-items-center">
                @foreach ($categories as $category)
                    <x-card-categories imageLink="{{ Storage::url($category->image) }}" title="{{ $category->name }}" desc="{{ $category->description }}" foodCategory="{{ $category->slug }}"></x-card-categories>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-app-layout>
