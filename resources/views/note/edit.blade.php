<x-app-layout>
    Edit 
    <form action="{{route('note.update',$note)}}" method="post">
        @csrf
        @method('put')
        <textarea name="note"  placeholder="Type the note in here" >{{$note->note}}</textarea>
        <input type="submit" value="Save Note">
    </form>
</x-app-layout>