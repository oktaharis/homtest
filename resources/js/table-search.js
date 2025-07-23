// Live Search Functionality
function initializeTableSearch(tableId = "dataTable", searchInputId = "searchInput") {
  const searchInput = document.getElementById(searchInputId)
  const table = document.getElementById(tableId)
  const tableBody = document.getElementById("tableBody")
  const emptyState = document.getElementById("emptyState")

  if (!searchInput || !table || !tableBody) return

  searchInput.addEventListener("input", function () {
    const searchTerm = this.value.toLowerCase().trim()
    const rows = tableBody.querySelectorAll("tr:not(#emptyState)")
    let visibleRows = 0

    rows.forEach((row) => {
      const text = row.textContent.toLowerCase()
      const shouldShow = text.includes(searchTerm)

      row.style.display = shouldShow ? "" : "none"
      if (shouldShow) visibleRows++
    })

    // Show/hide empty state
    if (emptyState) {
      emptyState.style.display = visibleRows === 0 ? "" : "none"
    }
  })
}

// Initialize on page load
document.addEventListener("DOMContentLoaded", () => {
  initializeTableSearch()
})
