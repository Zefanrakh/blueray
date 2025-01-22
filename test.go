package main

import (
	"encoding/json"
	"fmt"
	"strconv"
)

type CountCombinationResult struct {
	Total        int      `json:"total"`
	Combinations []string `json:"combinations"`
}

type FuncParam struct {
	digit       string
	combination string
}

func countCombinations(params *FuncParam) CountCombinationResult {
	digit, combination := params.digit, params.combination
	total := 0
	combinations := []string{}
	for i := 0; i < len(digit); i++ {
		combination += " " + string(digit[i])
		if i+1 < len(digit) {
			doubleDigit, _ := strconv.Atoi(string(digit[i]) + string(digit[i+1]))
			if doubleDigit <= 26 {
				newCombination := combination + string(digit[i+1])
				resultBranch := countCombinations(&FuncParam{digit: digit[i+2:], combination: newCombination})
				if resultBranch.Total != 0 {
					total += resultBranch.Total
					combinations = append(combinations, resultBranch.Combinations...)
				} else {
					total += 1
					combinations = append(combinations, newCombination)
				}
			}
		}
		if i == len(digit)-1 {
			total += 1
			combinations = append(combinations, combination)
		}
	}
	return CountCombinationResult{
		total,
		combinations,
	}

}

func main() {
	result := countCombinations(&FuncParam{digit: "1243752521494312"})
	jsonOutput, _ := json.MarshalIndent(result, "", "  ")

	fmt.Println(string(jsonOutput))
}
