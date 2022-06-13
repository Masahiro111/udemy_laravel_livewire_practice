<tr wire:key="topic-{{ $topic->id }}">
    <td>{{ $topic->id }}</td>
    <td>
        {{ $topic->title }}
    </td>
    <td>
        {{ Str::limit($topic->body, 30) }}
    </td>
    <td><a href="{{ route('topic.edit', $topic) }}">変更する</a></td>
</tr>