<div>
    <p>
        こんにちは、{{ $name }} さん。
    </p>

    <p>counter: {{ $counter }}</p>

    <form wire:submit.prevent="$refresh">
        <input type="text" wire:model="name">

        <div>
            現在の文字数: {{ mb_strlen($name) }}
        </div>

        <input type="submit" value="送信する">
    </form>

    <p>
        <input wire:click="increment" type="button" value="+1">
        <input wire:click="increment(10)" type="button" value="+10">
        <input wire:click="$set('counter', 0)" type="button" value="set 0">
    </p>
</div>