<div x-data="{open: true}">
    <form wire:submit.prevent="register" class="my-5 bg-red-50">
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
        </div>
    </form>
</div>