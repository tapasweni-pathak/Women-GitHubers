/*
 *
 * Author: thefourtheye (Sakthipriyan Vairamani)
 *
 */

'use strict';

const fs = require('fs');
const os = require('os');
const REGEX = /^\s*\[[^\]]+\]\s*\([^\)]+\)\s*$/;

function validator(err, data) {
  if (err) {
    console.error('[ERROR] ' + err);
    process.exit(-1);
  }

  const lines = data.toString()
    .split(os.EOL)
    .map((line) => line.toLowerCase())
    .filter((l) => REGEX.test(l));
  const sorted = lines.slice().sort((a, b) => a > b ? 1 : (a < b ? -1 : 0));
  const result = lines.every((value, idx) => value === sorted[idx]);

  if (result) {
    process.exit(0);
  } else {
    console.error('Names must be sorted in ascending order');
    process.exit(-1);
  }
}

fs.readFile('README.md', validator);
