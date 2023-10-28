const bgModal = document.getElementById("bg");
const dialogModal = document.getElementById("dialog");

const d_title = document.getElementById("d_title");
const f_image = document.getElementById("image_file");
const f_name = document.getElementById("name_file");
const konten_paper = document.getElementById("konten_paper");
const form = document.getElementById("form");

const i_judul = document.getElementById("i_judul");
const i_deskripsi = document.getElementById("i_deskripsi");
const i_file = document.getElementById("i_file");
let jenis_paper = [];

const container_form = document.getElementById('container_form')

const loadJenisPaper = (data) => {
    jenis_paper = data;
};

const handleModal = () => {
    if (bgModal.classList.contains("opacity-0")) {
        replaceClass({
            component: bgModal,
            value: [
                {
                    old: "opacity-0",
                    new: "opacity-30",
                },
                {
                    old: "pointer-events-none",
                    new: "pointer-events-auto",
                },
            ],
        });

        replaceClass({
            component: dialogModal,
            value: [
                {
                    old: "translate-x-[800px]",
                    new: "translate-x-0",
                },
                {
                    old: "md:translate-x-[1000px]",
                    new: "md:translate-x-0",
                },
            ],
        });
    } else {
        replaceClass({
            component: bgModal,
            value: [
                {
                    old: "opacity-30",
                    new: "opacity-0",
                },
                {
                    old: "pointer-events-auto",
                    new: "pointer-events-none",
                },
            ],
        });

        replaceClass({
            component: dialogModal,
            value: [
                {
                    old: "translate-x-0",
                    new: "translate-x-[800px]",
                },
                {
                    old: "md:translate-x-0",
                    new: "md:translate-x-[1000px]",
                },
            ],
        });
    }
};

const detailDataset = (data) => {
    d_title.innerHTML = data.nama_data;
    d_deskripsi.innerHTML = data.deskripsi_data;
    d_file.innerHTML = data.file_data;
    d_file.href = `/uploads/data/${data.file_data}`;

    var kontenHtml = "";
    data.paper.forEach((element) => {
        kontenHtml += `<div class="flex flex-row gap-3 py-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                            <path
                                d="M10.2915 7.12498V2.77081L14.6457 7.12498M4.74984 1.58331C3.87109 1.58331 3.1665 2.2879 3.1665 3.16665V15.8333C3.1665 16.2532 3.33332 16.656 3.63025 16.9529C3.92718 17.2498 4.32991 17.4166 4.74984 17.4166H14.2498C14.6698 17.4166 15.0725 17.2498 15.3694 16.9529C15.6664 16.656 15.8332 16.2532 15.8332 15.8333V6.33331L11.0832 1.58331H4.74984Z"
                                fill="black" />
                        </svg>
                        <p>${element.nama_paper}</p>
                    </div>`;
    });

    if (data.paper.length == 0) {
        kontenHtml = "<p>Tidak ada data</p>";
    }

    d_paper.innerHTML = kontenHtml;
    handleModal();
};

const loadFile = (e) => {
    f_name.innerHTML = e.files[0].name;
    f_image.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="40" height="44" viewBox="0 0 13 17" fill="none">
                            <path d="M7.2915 6.12498V1.77081L11.6457 6.12498M1.74984 0.583313C0.871087 0.583313 0.166504 1.2879 0.166504 2.16665V14.8333C0.166504 15.2532 0.333319 15.656 0.630251 15.9529C0.927184 16.2498 1.32991 16.4166 1.74984 16.4166H11.2498C11.6698 16.4166 12.0725 16.2498 12.3694 15.9529C12.6664 15.656 12.8332 15.2532 12.8332 14.8333V5.33331L8.08317 0.583313H1.74984Z" fill="black"/>
                        </svg>`;
    console.log({ e });
};

const tambahPaper = () => {
    const newForm = document.createElement("div");

    var jenis = "";
    jenis_paper.forEach((element) => {
        jenis += `<option value="${element.id_jenis_paper}">${element.jenis_paper}</option>`;
    });

    newForm.className =
        "flex flex-col md:flex-row md:justify-between gap-3 border-2 px-3 rounded-lg pt-2 pb-8 bg-gray-100 relative";
    newForm.innerHTML = `<div onclick="deletePaper(this)" class="bg-red-500 absolute right-4 py-1 rounded-md px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="18" viewBox="0 0 14 18"
                                fill="none">
                                <path
                                    d="M0.958333 15.3333C0.958333 16.3875 1.82083 17.25 2.875 17.25H10.5417C11.5958 17.25 12.4583 16.3875 12.4583 15.3333V3.83333H0.958333V15.3333ZM13.4167 0.958333H10.0625L9.10417 0H4.3125L3.35417 0.958333H0V2.875H13.4167V0.958333Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class="flex flex-col w-full md:w-1/2">
                            <label class="font-poppins-semibold text-lg py-2 border-b-2">Nama Paper</label>
                            <input required class="border-2 px-3 py-2 rounded-lg" type="text" name="nama_paper[]" id="paper1">
                        </div>
                        <div class="flex flex-col w-full md:w-1/2">
                            <label class="font-poppins-semibold text-lg py-2 border-b-2">Jenis Paper</label>
                            <select class="border-2 px-3 py-2 rounded-lg appearance-none" type="text" name="jenis_paper[]" id="jenis1">
                                ${jenis}
                            </select>
                        </div>`;

    konten_paper.appendChild(newForm);
    container_form.scrollTo({
        top: container_form.scrollHeight,
        behavior: 'smooth'
    })
};

const deletePaper = (e) => {
    e.parentNode.remove();
};

const prosesDataset = () => {
    var err = undefined;
    if (i_judul.value === "") {
        err = "Judul tidak boleh kosong";
    } else if (i_deskripsi.value === "") {
        err = "Deskripsi tidak boleh kosong";
    } else if (i_file.files.length === 0) {
        err = "File tidak boleh kosong";
    }

    for (let index = 0; index < konten_paper.children.length; index++) {
        const element = konten_paper.children[index];
        if (
            element.children[1].lastElementChild.value === "" ||
            element.children[2].lastElementChild.value === ""
        ) {
            err = "Isi pada field paper terlebih dahulu";
        }
    }

    if (err) {
        Swal.fire("Informasi", err, "warning");
    } else {
        Swal.fire({
            title: "Konfirmasi",
            text: `Apakah anda yakin ingin menambah data?`,
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
};
