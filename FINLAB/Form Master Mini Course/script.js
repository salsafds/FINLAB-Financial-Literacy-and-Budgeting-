document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("courseForm");
    const titleInput = document.getElementById("title");
    const descriptionInput = document.getElementById("description");
    const durationInput = document.getElementById("duration");
    const levelInput = document.getElementById("level");
    const courseTableBody = document.getElementById("courseTableBody");

    // Load data dari LocalStorage saat halaman dimuat
    loadCourses();

    // Tambah atau Edit Kursus
    form.addEventListener("submit", function(event) {
        event.preventDefault();

        let title = titleInput.value.trim();
        let description = descriptionInput.value.trim();
        let duration = durationInput.value.trim();
        let level = levelInput.value;

        if (title === "" || description === "" || duration === "") {
            alert("Semua kolom harus diisi!");
            return;
        }

        let courses = JSON.parse(localStorage.getItem("courses")) || [];

        let courseIndex = form.getAttribute("data-editing-index");

        if (courseIndex === null) {
            // Tambah Kursus Baru
            courses.push({ title, description, duration, level });
        } else {
            // Edit Kursus yang Sudah Ada
            courses[courseIndex] = { title, description, duration, level };
            form.removeAttribute("data-editing-index");
        }

        localStorage.setItem("courses", JSON.stringify(courses));
        form.reset();
        loadCourses();
    });

    // Memuat daftar kursus dari LocalStorage
    function loadCourses() {
        courseTableBody.innerHTML = "";
        let courses = JSON.parse(localStorage.getItem("courses")) || [];

        courses.forEach((course, index) => {
            let row = document.createElement("tr");
            row.innerHTML = `
                <td>${course.title}</td>
                <td>${course.description}</td>
                <td>${course.duration} menit</td>
                <td>${course.level}</td>
                <td>
                    <button class="edit-btn" onclick="editCourse(${index})">Edit</button>
                    <button class="delete-btn" onclick="deleteCourse(${index})">Hapus</button>
                </td>
            `;
            courseTableBody.appendChild(row);
        });
    }

    // Hapus Kursus
    window.deleteCourse = function(index) {
        let courses = JSON.parse(localStorage.getItem("courses")) || [];
        courses.splice(index, 1);
        localStorage.setItem("courses", JSON.stringify(courses));
        loadCourses();
    };

    // Edit Kursus
    window.editCourse = function(index) {
        let courses = JSON.parse(localStorage.getItem("courses")) || [];
        let course = courses[index];

        titleInput.value = course.title;
        descriptionInput.value = course.description;
        durationInput.value = course.duration;
        levelInput.value = course.level;

        form.setAttribute("data-editing-index", index);
    };
});