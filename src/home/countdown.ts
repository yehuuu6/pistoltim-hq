/**
 * Countdown to the birthday date in format DD/MM/YYYY
 *
 */

const birthdayDate = new Date("2024-02-11 23:35:00");
let isFinished = false;

function calculateTimeLeft(date: Date) {
  const difference = date.getTime() - Date.now();

  if (difference < 0) {
    isFinished = true;
    return {
      days: "00",
      hours: "00",
      minutes: "00",
      seconds: "00",
    };
  } else {
    isFinished = false;
  }

  return {
    days: String(Math.floor(difference / 1000 / 60 / 60 / 24)).padStart(2, "0"),
    hours: String(Math.floor(difference / 1000 / 60 / 60) % 24).padStart(
      2,
      "0"
    ),
    minutes: String(Math.floor(difference / 1000 / 60) % 60).padStart(2, "0"),
    seconds: String(Math.floor(difference / 1000) % 60).padStart(2, "0"),
  };
}

export default function startCountdown(date: Date = birthdayDate) {
  const smallText = document.querySelector(
    "#small-welcome-text"
  ) as HTMLHeadingElement;
  const goNotesBtn = document.querySelector("#see-notes") as HTMLButtonElement;
  const addNoteBtn = document.querySelector(
    "#create-note"
  ) as HTMLButtonElement;
  const countdown = document.querySelector(".countdown") as HTMLDivElement;
  const days = countdown.querySelector(".days") as HTMLSpanElement;
  const hours = countdown.querySelector(".hours") as HTMLSpanElement;
  const minutes = countdown.querySelector(".minutes") as HTMLSpanElement;
  const seconds = countdown.querySelector(".seconds") as HTMLSpanElement;

  if (!countdown || !days || !hours || !minutes || !seconds) {
    console.error("Countdown elements not found");
    return;
  }

  // Set initial values to 60
  days.textContent = "60";
  hours.textContent = "60";
  minutes.textContent = "60";
  seconds.textContent = "60";

  const animateCountdown = (
    element: HTMLSpanElement,
    initialTargetValue: number
  ) => {
    let currentValue = 60;
    const interval = setInterval(() => {
      const timeLeft = calculateTimeLeft(date);
      const targetValue = parseInt(
        timeLeft[element.className as keyof typeof timeLeft]
      );

      if (currentValue > initialTargetValue) {
        currentValue--;
        element.textContent =
          currentValue < 10 ? `0${currentValue}` : `${currentValue}`;
      } else if (currentValue > targetValue) {
        currentValue--;
        element.textContent =
          currentValue < 10 ? `0${currentValue}` : `${currentValue}`;
      } else {
        clearInterval(interval);
        // Start the actual countdown
        const a = setInterval(() => {
          const timeLeft = calculateTimeLeft(date);
          if (
            timeLeft.days === "00" &&
            timeLeft.hours === "00" &&
            timeLeft.minutes === "00" &&
            timeLeft.seconds === "00"
          ) {
            clearInterval(a);
            isFinished = true;
            addNoteBtn.remove();
            countdown.innerHTML = `İyi ki doğdun!`;
            smallText.textContent = `Bugün doğum günün Efe, dostlarının sana bıraktığı notlar oku.`;
            goNotesBtn.classList.remove("secondary");
            goNotesBtn.style.width = "40%";
            goNotesBtn.classList.add("primary");
            goNotesBtn.textContent = "Notları Oku";
          }
          element.textContent =
            timeLeft[element.className as keyof typeof timeLeft];
        }, 1000);
      }
    }, 50); // Adjust this value to control the speed of the countdown
  };

  const timeLeft = calculateTimeLeft(birthdayDate);
  animateCountdown(days, parseInt(timeLeft.days));
  animateCountdown(hours, parseInt(timeLeft.hours));
  animateCountdown(minutes, parseInt(timeLeft.minutes));
  animateCountdown(seconds, parseInt(timeLeft.seconds));

  if (isFinished) {
    addNoteBtn.remove();
    goNotesBtn.classList.remove("secondary");
    goNotesBtn.classList.add("primary");
    goNotesBtn.style.width = "40%";
    countdown.innerHTML = `İyi ki doğdun!`;
    smallText.textContent = `Bugün doğum günün Efe, dostlarının sana bıraktığı notlar oku.`;
    goNotesBtn.textContent = "Notları Oku";
  }
}
