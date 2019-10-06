<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        .title{
            color: red; 
            text-align:center
        }
        table {
            background: #ddd; 
            padding: 15px;
            border: 1px solid #000; 
            margin: 0 auto
        }
    </style>
    <title>Buổi 1 bài 2</title>
</head>
<body>
    <h1 class="title">Đăng ký tài khoản mới</h1>
    <p style="text-align: center">Vui lòng điền đầy đủ thông tin bên dưới để đăng ký tài khoản</p>
    <form method="POST" enctype="multipart/form-data" action="./handle-signup.php">
        <table>
            <tr>
                <td>Tên đăng nhập</td>
                <td><input type="text" name="username" require></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" name="password" require></td>
            </tr>
            <tr>
                <td>Gõ lại mật khẩu</td>
                <td><input type="password" name="rePassword"></td>
            </tr>
            <tr>
                <td>Hình đại diện</td>
                <td><input type="file" name="avatar" require></td>
            </tr>
            <tr>
                <td>Giới tính</td>
                <td>
                    <input type="radio" value="male" name="sex"> <span>Nam</span>
                    <input type="radio" value="female" name="sex"> <span>Nữ</span>
                    <input type="radio" value="dif" name="sex"> <span>Khác</span>
                </td>
            </tr>
            <tr>
                <td>Nghề nghiệp</td>
                <td>
                    <select name="job" require>
                        <option value="student">Học sinh</option>
                        <option value="teacher">Giáo viên</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Sở thích</td>
                <td>
                    <input type="checkbox" value="sport" name="hobbies[]"> Thể thao
                    <input type="checkbox" value="travel" name="hobbies[]"> Du lịch
                    <input type="checkbox" value="music" name="hobbies[]"> Âm nhạc
                    <input type="checkbox" value="fashion" name="hobbies[]"> Thời trang
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit">Đăng kí</button>
                </td>
                <td>
                    <button type="reset">Làm lại</button>
                </td>
            </tr>
        </table>

    </form>
</body>
</html>