/**
 *
 * @param {string} str
 * @param {string} pattern
 */
function getStringCountFromPattern(str, pattern) {
    const groups = [];
    for (let i = 0; i < str.length; i++) {
        const patternLen = pattern.length;
        const group = str.slice(i, i + patternLen);
        if (group.length !== patternLen) continue;
        if (group.split("").every((char) => pattern.includes(char))) {
            groups.push(group);
        }
    }
    return groups.length;
}

console.log(
    getStringCountFromPattern(
        "ABDCKDHJABDCBDAUOQJDBADCLDLCHBCBABCBAABCDAJDBABDCABDABDBCADBCASSJGABCDAUTACBDBQWUDNCDBCADKDHABDJGBDABCBDBADCACADBADBCBAD",
        "ABCD"
    )
);

/**
 *
 * @param {string} digit
 * @returns {{total: number, combinations: string[]}}
 */
function countCombinations(digit, combination = "") {
    let total = 0;
    let combinations = [];
    for (let i = 0; i <= digit.length; i++) {
        combination += ` ${digit[i]}`;
        if (i + 1 < digit.length) {
            const doubleDigit = Number(`${digit[i]}${digit[i + 1]}`);
            if (doubleDigit <= 26) {
                const newCombination = `${combination}${Number(digit[i + 1])}`;
                const resultBranch = countCombinations(
                    digit.slice(i + 2),
                    newCombination
                );
                if (resultBranch.total) {
                    total += resultBranch.total;
                    combinations = combinations.concat(
                        resultBranch.combinations
                    );
                } else {
                    total += 1;
                    combinations.push(newCombination);
                }
            }
        }
        if (i === digit.length - 1) {
            total += 1;
            combinations.push(combination);
        }
    }
    return { total, combinations };
}
console.log(countCombinations("1243752521494312"));
