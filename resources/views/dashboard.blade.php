<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            <div class="flex">
                <div class="flex-auto text-2xl mb-4">List Jadwal</div>
                
               
            </div>
            <div class="flex">
                <div class="flex-auto text-right mt-2">
                    <a href="/learn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambahkan Jadwal Baru</a>
                </div>
            </div>
            <div class="flex">
            </div>
            &nbsp;
          
            <table class="w-full text-md rounded mb-4">
                <thead>
                <tr class="border-b">
                    <th class="text-left p-3 px-5">Jadwal</th>
                    <th class="text-left p-3 px-5">Tanggal</th>
                    <th class="text-left p-3 px-5">Status</th>
                    <th class="text-left p-3 px-5">Aksi</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach(auth()->user()->learns as $learn)
                
                    <tr class="border-b hover:bg-blue-300">
                        <td class="p-3 px-5">
                            {{$learn->jadwal}}
                        </td>
                        <td class="p-3 px-5">
                            {{$learn->tanggal}}
                        </td>
                        
                        <td class="p-3 px-5">
                            <form action="/learn/{{$learn->id_jadwal}}" class="inline-block">
                            @if ($learn->status == "Soon")
                                <button type="submit" name="status" formmethod="POST" class="text-sm bg-green-500 hover:bg-indigo-600 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">{{$learn->status}}</button>
                                {{ csrf_field() }}
                            @elseif ($learn->status == "Expired")
                                <button type="submit" name="status" formmethod="POST" class="text-sm bg-red-500 hover:bg-indigo-600 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">{{$learn->status}}</button>
                                {{ csrf_field() }}
                            @else
                                <button type="submit" name="status" formmethod="POST" class="text-sm bg-yellow-500 hover:bg-indigo-600 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">{{$learn->status}}</button>
                                {{ csrf_field() }}
                                @endif
                            </form>
                        </td>
                      
                        <td class="p-3 px-5">
                            <a href="/learn/{{$learn->id_jadwal}}" name="edit" class="mr-3 text-sm bg-green-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
                        </td>
                        <td class="p-3 px-5">
                            <form action="/learn/{{$learn->id_jadwal}}" class="inline-block">
                                <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-indigo-600 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                {{ csrf_field() }}
                            </form>
                        </td>
                    </tr>
                   
                @endforeach
                </tbody>
            </table>
        
        </div>
    </div>
</div>
</x-app-layout>