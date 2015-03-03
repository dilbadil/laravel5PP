Welcome <b>{! $user->fullname !}</b> !
Here your detail information
<table>
    <tr>
        <th>Fullname</th>
        <th>Email</th>
        <th>Username</th>
    </tr>
    <tr>
        <td>{! $user->fullname !}</td>
        <td>{! $user->email !}</td>
        <td>{! $user->username !}</td>
    </tr>
</table>
