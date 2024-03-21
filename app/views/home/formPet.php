<div class='container'>
    <div class='d-flex justify-content-center'>



        <form class='d-flex flex-column' style='gap:10px;' method='post' action="<?php echo isset($data['pet_id']) ? 'post_update_pet/' . $data['id'] : "home/post_request";  ?>">
            <div class='d-flex' style='gap:10px;'>
                <label for="pet_id" class="form-label">Pet ID</label>
                <input <?php echo isset($data['pet_id']) ? 'disabled' : ""; ?> value="<?php echo isset($data['pet_id']) ? $data['pet_id'] : ""; ?>" class="form-control" type="text" name="pet_id" id="id" placeholder="input ID">
            </div>

            <div class='d-flex' style='gap:10px;'>
                <label for="name" class="form-label">Pet Name</label>
                <input value="<?php echo isset($data['name']) ? $data['name'] : ""; ?>" class="form-control" type="text" name="name" id="name" placeholder="input name">
            </div>

            <div class='d-flex' style='gap:10px;'>
                <label for="age" class="form-label">Age</label>
                <input value="<?php echo isset($data['age']) ? $data['age'] : ""; ?>" class="form-control" type="number" name="age" id="age" placeholder="input age">
            </div>

            <div class='d-flex' style='gap:10px;'>
                <label for="weight" class="form-label">Weight</label>
                <input value="<?php echo isset($data['weight']) ? $data['weight'] : ""; ?>" class="form-control" type="number" name="weight" id="weight" placeholder="input weight">
            </div>

            <div class='d-flex' style='gap:10px;'>
                <label for="length" class="form-label">Length</label>
                <input value="<?php echo isset($data['length']) ? $data['length'] : ""; ?>" class="form-control" type="number" name="length" id="length" placeholder="input length">
            </div>
            <div class='d-flex'>
                <label class="form-label"> Breed</label>
                <select class="form-select" aria-label="Default select example" name='type_id'>
                   
                    <?php foreach ($breeds as $breed) : ?>
                        <option value=<?php echo $breed['id'] ?>>
                            <?php echo $breed['breed'].' - '.$breed['type'] ?>
                        </option>
                    <?php endforeach; ?>

                </select>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>