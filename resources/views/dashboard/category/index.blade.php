@extends('dashboard.layouts.main')

@section('content')
  <div class="grid grid-cols-12 gap-4">
    <div class="col-span-12 lg:col-span-9 p-4">
      @if (session()->has('success'))
        <p class="mb-5 rounded-md bg-green-100 px-6 py-5 text-green-800 border border-green-300">
            {{ session('success') }}
        </p> 
      @endif  
      <a href="/dashboard/category/create" class="px-5 py-3 bg-sky-300 rounded-md text-gray-500 hover:bg-sky-400 transition"><i class="fa-solid fa-square-plus"></i> Tambah category</a>
    </div>
  </div>

  <div class="grid grid-cols-12 gap-4">
    <div class="col-span-12 lg:col-span-9 p-4">
      <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Slug
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td class="px-6 py-4">
                            {{ $category->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $category->slug }}
                        </td>
                        <td class="px-6 py-4 flex gap-2">
                            <a class="text-yellow-500" href="/dashboard/category/{{ $category->slug }}/edit"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                            |
                            <form action="/dashboard/category/{{ $category->slug }}" method="POST">
                              @csrf
                              @method('delete')
                              <button type="submit" class="text-red-500 hover:cursor-pointer"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection	