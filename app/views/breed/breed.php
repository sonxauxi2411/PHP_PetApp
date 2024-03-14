<div class='container'>
    <div class='d-flex justify-content-center'>
       

        <form class='d-flex flex-column' style='gap:10px;' method='post' action="breed/create">
            <div class='d-flex' style='gap:10px;'>
                <label for="breed" class="form-label">Breed</label>
                <input  class="form-control" type="text" name="breed" id="breed" placeholder="input Breed">
            </div>

            <div class='d-flex' style='gap:10px;'>
            <label class="form-label"> Type</label>
            <select class="form-select" name="type" aria-label="Default select example">
                <option value="Cat">Cat</option>
                <option value="Dog">Dog</option>

            </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Breed</th>
                <th scope="col">Type</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['breed']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                  
                    <td class='d-flex' style='gap:10px;'>
                        <form method='get' action=<?php echo 'breed/delete/' . $row['id'] ?>>
                            <button type='submit' class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>