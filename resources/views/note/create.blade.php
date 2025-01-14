<x-app-layout>
    Create Blade
    <form action="{{route('note.store')}}" method="post">
        @csrf
        @method('post')
        <textarea name="note"  placeholder="Type the note in here"></textarea>
        <input type="submit" value="Save Note">
    </form>
</x-app-layout>