import { sendApiRequest } from "@/utils/functions";

export function updateNoteContent(noteElement: HTMLDivElement) {
  const id = noteElement.getAttribute("data-id") as string;
  const noteContent = document.querySelector(".read-note") as HTMLDivElement;

  const oldNoteContent = noteContent.innerHTML;

  // Fetch note content from the server

  const formData = new FormData();
  formData.append("id", id);

  const response = sendApiRequest("/api/get-note-by-id.php", formData);
  response
    .then((data) => {
      noteContent.innerHTML = data[1];
    })
    .finally(() => {
      const closeReadNote = noteContent.querySelector(
        ".cancel"
      ) as HTMLButtonElement;
      const readNoteContainer = document.querySelector(
        "#read-note-container"
      ) as HTMLDivElement;
      closeReadNote.addEventListener("click", (e) => {
        e.preventDefault();
        readNoteContainer.classList.add("hide");
        noteContent.innerHTML = oldNoteContent;
      });
    });
}
