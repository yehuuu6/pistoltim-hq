const notificationBar = document.querySelector(
  ".notification"
) as HTMLDivElement;
const progressBar = notificationBar.querySelector(
  "#progress-bar"
) as HTMLSpanElement;

// Define a variable to store the interval
let progress: any;
let disappear: any;

export function showNotification(status: string, message: string) {
  // Clear the interval
  clearInterval(disappear);
  clearInterval(progress);
  notificationBar.className = "notification show";
  progressBar.style.width = "100%";
  notificationBar.classList.add("show");
  notificationBar.classList.add(status);
  const messageContainer = notificationBar.querySelector(
    "#message"
  ) as HTMLHeadElement;
  messageContainer.textContent = message;

  const totalTime = 5000;
  let elapsed = totalTime; // Start at totalTime

  progress = setInterval(() => {
    elapsed -= 10; // Decrement elapsed
    const width = (elapsed / totalTime) * 100;
    progressBar.style.width = `${width}%`;
    if (elapsed <= 0) {
      // Check if elapsed is less than or equal to 0
      clearInterval(progress);
    }
  }, 10);

  disappear = setTimeout(() => {
    notificationBar.className = "notification";
  }, totalTime);
}
