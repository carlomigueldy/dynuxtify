/**
 * Converts integer into money format in USD.
 * 
 * @param { Integer } number 
 * @returns { String } e.g. $50.00
 */
export const moneyFormat = (number) => {
  return new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
    minimumFractionDigits: 2
  }).format(number)
}

/**
 * Formats date readable for Vuetify components.
 * 
 * @param { String } date 
 * @returns { String } e.g. 2020-04-28
 */
export const dateFormat = (date) => {
  return new Date(date)
    .toISOString()
    .substr(0, 10)
}

/**
 * Converts date into UTC timezone.
 * This solves timezone issues. 
 * 
 * @param { String } date 
 * @returns { String } e.g. 2020 04 28
 */
export const mapUTCDate = (date) => {
  const d = new Date(date)
  return `${d.getUTCFullYear()} ${d.getUTCMonth() + 1} ${d.getUTCDate()}`
}

/**
 * Checks if user is administrator.
 * 
 * @param { Object } user 
 * @returns { Boolean }
 */
export const isAdmin = (user) => (
  user.roles.includes('administrator')
)