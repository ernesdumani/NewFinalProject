<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management</title>
    <style>
        body { font-family: Arial, sans-serif;  background: linear-gradient(to right, #574964, #9F8383, #C8AAAA ); text-align: center; }
        .container { width: 80%; margin: 20px auto; background: linear-gradient(to right,rgb(129, 121, 137),rgb(173, 151, 151),rgb(210, 186, 186) ); ; padding: 20px; border-radius: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        .btn { padding: 5px 10px; border: none; cursor: pointer; }
        .edit { background: #ffc107; }
        .delete { background: #dc3545; color: white; }
        .add-book { background: #28a745; color: white; padding: 10px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Book Management</h2>
        <button class="add-book" onclick="addBook()">Add New Book</button>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="book-list">
                <tr>
                    <td>The Great Gatsby</td>
                    <td>F. Scott Fitzgerald</td>
                    <td>Classic</td>
                    <td>
                        <button class="btn edit" onclick="editBook(this)">Edit</button>
                        <button class="btn delete" onclick="deleteBook(this)">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>1984</td>
                    <td>George Orwell</td>
                    <td>Dystopian</td>
                    <td>
                        <button class="btn edit" onclick="editBook(this)">Edit</button>
                        <button class="btn delete" onclick="deleteBook(this)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        function addBook() {
            let title = prompt("Enter book title:");
            let author = prompt("Enter author:");
            let category = prompt("Enter category:");
            if (title && author && category) {
                let row = `<tr><td>${title}</td><td>${author}</td><td>${category}</td>
                            <td><button class='btn edit' onclick='editBook(this)'>Edit</button>
                            <button class='btn delete' onclick='deleteBook(this)'>Delete</button></td></tr>`;
                document.getElementById("book-list").innerHTML += row;
            }
        }

        function editBook(btn) {
            let row = btn.parentNode.parentNode;
            let title = prompt("Edit title:", row.cells[0].innerText);
            let author = prompt("Edit author:", row.cells[1].innerText);
            let category = prompt("Edit category:", row.cells[2].innerText);
            if (title && author && category) {
                row.cells[0].innerText = title;
                row.cells[1].innerText = author;
                row.cells[2].innerText = category;
            }
        }

        function deleteBook(btn) {
            if (confirm("Are you sure you want to delete this book?")) {
                btn.parentNode.parentNode.remove();
            }
        }
    </script>
</body>
</html>
