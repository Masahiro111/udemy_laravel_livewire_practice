<div>
    <form wire:submit.prevent="register" class="my-5 bg-blue-100">
        <div>
            タイトル：<input type="text" wire:model.lazy="post.title">
            <div>
                @error('title')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div>
            本文：<textarea wire:model.lazy="post.body" cols="30" rows="5"></textarea>
            <div>
                @error('body')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div>
            <input type="submit" value="送信する">
            <span id="created-user-message" style="display: none">登録しました</span>
        </div>
    </form>

    <script>
        Livewire.on('created-post', () => {
            const messageBox = document.getElementById('created-user-message');
            messageBox.style.display = 'inline';
            setTimeout(() => {
                messageBox.style.display = 'none';
            }, 1000);
        });
    </script>
</div>