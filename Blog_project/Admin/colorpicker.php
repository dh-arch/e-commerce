<div class="mt-5 d-flex">
    <div>
        <input type="checkbox" class="addcolor" id="addcolor" name="addcolor" value=""> &nbsp;&nbsp;
        <label style="font-size: 20px;"> Add Color </label>
    </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="">
        <button type="button" id="openDialogBtn"> + </button>
    </div>
</div>

<div id="color" class="my-3">

    <div class="colorContainer ">
        <div id="selectedColors">
            <input type="hidden" id="setcolor" class="setcolor">
        </div>
    </div>

    <!-- Color Picker Dialog -->
    <div id="colorPickerDialog" class="dialog">
        <h2>Pick a Color</h2>
        <input type="color" id="colorInput" style="padding: 1px;" value="#000000"><br><br>

        <div class="dialog-buttons">
            <button type="button" id="cancelBtn"> Cancel </button> &nbsp;
            <button type="button" id="okBtn"> OK </button>
        </div>
    </div>

    <!-- change color  -->
    <div id="change-dialog" class="dialog">
        <h2>Change a Color</h2>
        <input type="color" id="colorinput" style="padding: 1px;" value="#000000"><br><br>

        <div class="dialog-buttons">
            <button type="button" id="cancel"> Cancel </button> &nbsp;
            <button type="button" id="remove"> Remove </button> &nbsp;
            <button type="button" id="change"> Change </button>
        </div>
    </div>

</div>

<script>
    let colorCounter = 0; // Initialize a counter for unique IDs
    let selectedColorDiv = null; // Variable to store the currently selected colorDiv

    $('#openDialogBtn').hide();

    $('.addcolor').click(function() {
        $('#openDialogBtn').toggle();
    });

    const openDialogBtn = document.getElementById('openDialogBtn');
    const dialog = document.getElementById('colorPickerDialog');
    const colorInput = document.getElementById('colorInput');
    const selectedColorsContainer = document.getElementById('selectedColors');
    let changedialog = document.getElementById('change-dialog');
    let colorinput = document.getElementById('colorinput');

    // Set a default color
    let defaultColor = '#000000';

    openDialogBtn.addEventListener('click', () => {
        // Open dialog and set default color
        colorInput.value = defaultColor;
        dialog.classList.add('active');
    });

    // Handle "Cancel" button click
    document.getElementById('cancelBtn').addEventListener('click', () => {
        dialog.classList.remove('active');
    });

    // Handle "OK" button click
    document.getElementById('okBtn').addEventListener('click', () => {
        const selectedColor = colorInput.value;

        // set color in colorinput
        let setcolor = document.getElementById('setcolor');
        setcolor.value = selectedColor;
        let color = setcolor.value;

        // Increment the colorCounter for a unique ID
        colorCounter++;

        // Create a new div for the outer container
        const colorDiv = $('<div></div>');
        colorDiv.addClass('selectedColor');
        colorDiv.attr('id', 'colorDiv-' + colorCounter); // Add unique ID
        colorDiv.css('border-color', selectedColor);

        // Create a new div for the inner circle
        const innerCircle = $('<div></div>');
        innerCircle.addClass('selectedColorInner');
        innerCircle.css('background-color', selectedColor);

        // Append the inner circle to the outer container
        colorDiv.append(innerCircle);

        // Add the outer container (with inner color) to the selectedColorsContainer
        $(selectedColorsContainer).append(colorDiv);

        // Save the selected color for next time
        defaultColor = selectedColor;

        // Add click event to colorDiv to get the border color and open change dialog
        colorDiv.click(function() {
            selectedColorDiv = $(this); // Save reference to the clicked colorDiv
            const borderColor = selectedColorDiv.css('border-color');
            console.log('Border color:', borderColor);
            colorinput.value = borderColor; // Set color input to current border color
            colorinput.value = defaultColor;
            changedialog.classList.add('active');
        });

        // Close the color picker dialog
        dialog.classList.remove('active');
    });

    // Handle change dialog cancel button click
    document.getElementById('cancel').addEventListener('click', () => {
        changedialog.classList.remove('active');
    });

    // Handle "change" button click
    document.getElementById('change').addEventListener('click', () => {
        if (selectedColorDiv) {
            const newColor = colorinput.value; // Get the new color from the input
            selectedColorDiv.css('border-color', newColor); // Change the border color
            selectedColorDiv.find('.selectedColorInner').css('background-color', newColor); // Change the inner circle color

            changedialog.classList.remove('active'); // Close the dialog
        }
    });

    // Handle "Remove" button click
    document.getElementById('remove').addEventListener('click', () => {
        if (selectedColorDiv) {
            selectedColorDiv.remove(); // Remove the selected color div
            selectedColorDiv = null; // Reset the selectedColorDiv variable
            changedialog.classList.remove('active'); // Close the dialog
        }
    });
    c
</script>