{{--{{ dd($contacts) }}--}}
<table>
    <thead>
    <tr>
        <th><b>Имя</b></th>
        <th><b>Email</b></th>
        <th><b>Телефон</b></th>
        <th><b>Сайт</b></th>
        <th><b>Дата рождения</b></th>
        <th><b>Город</b></th>
        <th><b>Место работы</b></th>
        <th><b>Должность</b></th>
        <th><b>Email рабочий</b></th>
        <th><b>Группа</b></th>
        <th><b>Комментарий</b></th>
    </tr>
    </thead>
    <tbody>
    @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->first_name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->number }}</td>
            <td>{{ $contact->site }}</td>
            <td>{{ $contact->birthday }}</td>
            <td>{{ $contact->city }}</td>
            <td>{{ $contact->work }}</td>
            <td>{{ $contact->position }}</td>
            <td>{{ $contact->work_email }}</td>
            <td>{{ $contact->group ? $contact->group->name : '' }}</td>
            <td>{{ $contact->comment }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
