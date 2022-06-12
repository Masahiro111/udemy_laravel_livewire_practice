<div>

    <form>
        検索用語：<input type="text" wire:model="word">
    </form>

    @livewire('post-create')

    <hr>

    @livewire('post-edit')

    <div style="height: 30px;">
        @if (session('updatedPost'))
        {{-- 毎回、別の div と認識させるためにランダムな wire:key を 発行。よって、JavaScript が実行される。 --}}

        <div wire:key="{{ Str::randam() }}"
             x-data="{{ show:false }}"
             x-show="show"
             x-init="
                setTimeout(fn => {show = true},10);
                setTimeout(fn => {show = false}, 1500);
             "
             style="background: gold; width:200px;"
             x-transition:enter.duration.500ms
             x-transition:leave.duration.400ms>
            変更しました。
        </div>

        @endif

    </div>

    <table>
        @foreach ($posts as $post)
        <tr wire:key="post-{{ $post->id }}">
            <td>{{ $post->id }}</td>
            <td>
                {{ $post->title }}
                <span>
                    @if ($post->photo)
                    <img src="{{ storage::url($post->post) }}" width="50" height="50" alt="">
                    @endif
                </span>
            </td>
            <td wire:click="$emitTo('post-edit', 'showModal', {{ $post->id }})">変更する</td>
            <td onclick="
                confirm('削除してもよろしいですか？') && 
                Livewire.emit('deleted-post', {{ $post->id }})
                ">削除する</td>
        </tr>
        @endforeach
    </table>

    <div>
        {{ $posts->links() }}
    </div>
</div>