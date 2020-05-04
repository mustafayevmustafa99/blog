
{{--<h1 style="color:green">Name: {{$data['name'] ?? 'User name'}}</h1>--}}
{{--<h1 style="color:green">Email: {{$data['email'] ?? 'User email'}}</h1>--}}
{{--<h1 style="color:green">Phone: {{$data['phone'] ?? 'User phone'}}</h1>--}}
{{--<h1 style="color:green">Message: {{$data['message'] ?? 'User message'}}</h1>--}}

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Message</th>
    </tr>
    <tr>
        <td>{{$data['name'] ?? 'User name'}}</td>
        <td> {{$data['email'] ?? 'User email'}}</td>
        <td>{{$data['phone'] ?? 'User phone'}}</td>
        <td>{{$data['message'] ?? 'User message'}}</td>
    </tr>
</table>
