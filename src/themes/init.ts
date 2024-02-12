import "./theme.css";

/**
 * Loads the theme from the local storage and sets root attribute accordingly
 * Also listens for the theme toggle change and updates the theme.
 * @returns {void}
 */
export default function initTheme(): void {
  // Get the current theme from the local storage or set it to dark by default
  const currentTheme = localStorage.getItem("theme") || "dark";

  // Set the theme in local storage
  localStorage.setItem("theme", currentTheme);

  const themeToggle = document.getElementById(
    "theme-toggle"
  ) as HTMLInputElement;

  const root = document.documentElement as HTMLElement;

  // If the current theme in the local storage is dark, set the theme to dark
  root.setAttribute("data-theme", currentTheme);

  // Error handling for the pages without the theme toggle
  if (!themeToggle) {
    return;
  }

  themeToggle.checked = currentTheme === "dark";

  // Listen for the theme toggle change
  themeToggle.addEventListener("change", function (e: Event) {
    const theme = (e.target as HTMLInputElement).checked ? "dark" : "light";
    root.setAttribute("data-theme", theme);
    localStorage.setItem("theme", theme);
  });
}
