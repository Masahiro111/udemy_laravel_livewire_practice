<div>
    <p>counter: {{ $counter }}</p>
    <p>
        <input wire:click="increment" type="button" value="+1">
        <input wire:click="increment(10)" type="button" value="+10">
        <input wire:click="$set('counter', 0)" type="button" value="set 0">
    </p>
</div>