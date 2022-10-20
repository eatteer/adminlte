const capitalize = (str) => {
  // Empty string
  if (str.length == 0) return "";

  // String with at least one char
  const firstChar = str[0].toUpperCase();
  if (str.length == 1) return firstChar;

  // String with two or more chars
  if (str.length >= 2) {
    const restChars = str.slice(1).toLowerCase();
    const capitalizedStr = `${firstChar}${restChars}`;
    return capitalizedStr;

  }
}