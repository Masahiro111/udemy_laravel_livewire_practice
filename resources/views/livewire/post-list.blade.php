<div>

    <form>
        検索用語：<input type="text" wire:model="word">
    </form>

    @livewire('post-create')

    <hr>

    @livewire('post-edit')

    <table>
        @foreach ($posts as $post)
        <tr wire:key="post-{{ $post->id }}">
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>変更する</td>
        </tr>
        @endforeach
    </table>

    <div>
        {{ $posts->links() }}
    </div>
</div>