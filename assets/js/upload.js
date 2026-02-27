const dropZone = document.getElementById("drop-zone");
const fileInput = document.getElementById("file-input");
const preview = document.getElementById("preview");

// ===============================
// Prevent default browser behavior
// ===============================
window.addEventListener("dragover", (e) => {
  const fileItems = [...e.dataTransfer.items].filter(
    (item) => item.kind === "file"
  );

  if (fileItems.length > 0) {
    e.preventDefault();
  }
});

window.addEventListener("drop", (e) => {
  if ([...e.dataTransfer.items].some((item) => item.kind === "file")) {
    e.preventDefault();
  }
});

// ===============================
// Drag over drop zone
// ===============================
dropZone.addEventListener("dragover", (e) => {
  const fileItems = [...e.dataTransfer.items].filter(
    (item) => item.kind === "file"
  );

  if (fileItems.length > 0) {
    e.preventDefault();

    if (fileItems.some((item) => item.type.startsWith("text/"))) {
      e.dataTransfer.dropEffect = "copy";
    } else {
      e.dataTransfer.dropEffect = "none";
    }
  }
});

// ===============================
// Drop handler
// ===============================
dropZone.addEventListener("drop", (e) => {
  e.preventDefault();

  const files = [...e.dataTransfer.files];
  handleFiles(files);
});

// ===============================
// Click upload
// ===============================
fileInput.addEventListener("change", (e) => {
  const files = [...e.target.files];
  handleFiles(files);
});

// ===============================
// Handle files
// ===============================
function handleFiles(files) {
  preview.innerHTML = ""; // Clear previous preview

  files.forEach((file) => {
    if (!file.type.startsWith("text/")) return;

    const reader = new FileReader();

    reader.onload = function (e) {
      const content = e.target.result;

      const li = document.createElement("li");
      li.style.height = "auto";
      li.style.flexDirection = "column";
      li.style.alignItems = "flex-start";

      const fileName = document.createElement("strong");
      fileName.textContent = file.name;

      const contentDiv = document.createElement("div");
      contentDiv.style.width = "100%";

      if (file.name.endsWith(".md")) {
        contentDiv.innerHTML = parseMarkdown(content);
      } else {
        contentDiv.textContent = content;
      }

      li.appendChild(fileName);
      li.appendChild(contentDiv);
      preview.appendChild(li);
    };

    reader.readAsText(file);
  });
}

// ===============================
// Basic Markdown Parser
// ===============================
function parseMarkdown(md) {
  return md;
}
