export const moneyFormat = (number) => {
  return new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
    minimumFractionDigits: 2
  }).format(number)
}

export const dateFormat = (date) => {
  return new Date(date)
    .toISOString()
    .substr(0, 10)
}

export const mapUTCDate = (date) => {
  const d = new Date(date)
  return `${d.getUTCFullYear()} ${d.getUTCMonth() + 1} ${d.getUTCDate()}`
},