<tr wire:key="topic-{{ $topic->id }}">
    <td>{{ $topic->id }}</td>
    <td>
        {{ $topic->title }}
    </td>
    <td>
        {{ Str::limit($topic->body, 30) }}
    </td>
    <td>変更する</td>
</tr>