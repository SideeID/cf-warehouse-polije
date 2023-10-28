const bgModal = document.getElementById("bg");
const dialogModal = document.getElementById("dialog");

const d_title = document.getElementById("d_title");
const d_deskripsi = document.getElementById("d_deskripsi");
const d_file = document.getElementById("d_file");
const d_paper = document.getElementById("d_paper");

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

const tolakDataset = (url) => {
    Swal.fire({
        title: "Konfirmasi",
        text: "Apakah anda yakin ingin menolak dataset?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonText: "Tidak",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
    }).then((result) => {
        if (result.isConfirmed) {
            location.href = window.location.origin + url;
        }
    });
};
const terimaDataset = (url) => {
    Swal.fire({
        title: "Konfirmasi",
        text: "Apakah anda yakin ingin mengkonfirmasi dataset?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonText: "Tidak",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
    }).then((result) => {
        if (result.isConfirmed) {
            location.href = window.location.origin + url;
        }
    });
};

const detailDataset = (data) => {
    d_title.innerHTML = data.nama_data;
    d_deskripsi.innerHTML = data.deskripsi_data;
    d_file.innerHTML = data.file_data;
    d_file.href = `/download/${data.file_data}/${data.id_data}`;


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
