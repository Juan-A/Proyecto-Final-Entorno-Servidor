<main>
    <table>
        <tr>
            <th>
                ID de Usuario
            </th>
            <th>
                Email
            </th>
            <th>
                Nickname
            </th>
            <th>
                Rol
            </th>
            <th>
                Nombre
            </th>
            <th>
                Apellidos
            </th>
            <th>
                Editar Usuario
            </th>
            <th>
                Eliminar Usuario
            </th>
        </tr>
        </tr>
        <?

       $users = getAllUsers();
        foreach ($users as $user) {
            echo "<tr>";
            foreach (cleanUserRow($user) as $data) {
                echo "
                <td>
                $data
                </td>";
            }
            echo "<td><a class='buttonWarning' href='user_modify.php?id=".$user["user_id"]."'><i class='bx bx-edit' ></i>Editar Usuario</a></td>";
            echo "<td><a class='buttonDanger deleteUser' href='user_management.php?deleteUser=".$user["user_id"]."'><i class='bx bx-edit' ></i>Editar Usuario</a></td>";
            echo "</tr>";
        } 
        ?>
    </table>
</main>