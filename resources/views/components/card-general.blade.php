<div  class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white group">
    <div {{ $attributes }} class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
        {{ $icon ?? '' }}
    </div>
    <div class="text-right">
      <p class="text-3xl mb-2 font-medium">{{ $value ?? '' }}</p>
      <p class="text-white text-opacity-75">{{ $slot }}</p>
    </div>
  </div>
