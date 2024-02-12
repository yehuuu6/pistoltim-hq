import { sendApiRequest } from "@/utils/functions";
import { showNotification } from "./notification";
import startCountdown from "./countdown";
import { updateNoteContent } from "./read";

import "./home.css";

const noteForm = document.querySelector("#add-note") as HTMLFormElement;

export default function initHome() {
  noteFormController();
  characterCounter();
  noteReader();
  startCountdown();
}

function noteFormController() {
  const addNote = document.querySelector("#create-note") as HTMLButtonElement;
  const addNoteContainer = document.querySelector(
    "#add-note-container"
  ) as HTMLDivElement;
  const confirmAddNote = addNoteContainer.querySelector(
    ".primary"
  ) as HTMLButtonElement;
  const cancelAddNote = addNoteContainer.querySelector(
    ".cancel"
  ) as HTMLButtonElement;
  const faqAnchor = document.querySelector("#go-faq") as HTMLAnchorElement;
  addNote.addEventListener("click", (e) => {
    e.preventDefault();
    addNoteContainer.classList.remove("hide");
  });
  confirmAddNote.addEventListener("click", (e) => {
    e.preventDefault();
    createNote().then((response) => {
      const [status, message] = response;
      if (status === "success") {
        addNoteContainer.classList.add("hide");
        noteForm.reset();
        showNotification(status, message);
      } else {
        showNotification(status, message);
      }
    });
  });

  cancelAddNote.addEventListener("click", (e) => {
    e.preventDefault();
    addNoteContainer.classList.add("hide");
  });

  faqAnchor.addEventListener("click", () => {
    addNoteContainer.classList.add("hide");
  });
}

function characterCounter() {
  const textArea = document.querySelector(
    "#note-content"
  ) as HTMLTextAreaElement;
  const counter = document.querySelector(
    "#character-counter"
  ) as HTMLSpanElement;

  textArea.addEventListener("keyup", (e) => {
    const text = textArea.value;
    if (text.length > 150) {
      counter.style.color = "var(--warning)";
    }
    if (text.length > 300) {
      counter.style.color = "#ff2828ba";
    }
    if (text.length < 150) {
      counter.style.color = "var(--text)";
    }
    counter.innerHTML = `${text.length}/350`;
  });
}

function noteReader() {
  const notes = document.querySelectorAll(
    ".note"
  ) as NodeListOf<HTMLDivElement>;
  const readNoteContainer = document.querySelector(
    "#read-note-container"
  ) as HTMLDivElement;

  notes.forEach((note) => {
    note.addEventListener("click", (e) => {
      e.preventDefault();
      readNoteContainer.classList.remove("hide");
      updateNoteContent(note);
    });
  });
}

/**
 * Sends a request to create a note to the API
 * @returns {Promise<[string, string]>} A promise that resolves to an array containing the status and message
 */
async function createNote(): Promise<[string, string]> {
  const formData = new FormData(noteForm);
  const response = await sendApiRequest("/api/add-note.php", formData);
  return response;
}
