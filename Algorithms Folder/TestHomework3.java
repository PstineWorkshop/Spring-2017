// Test driver for the Homework3 class
// Do not make any changes to this file!
// Xiwei Wang

import java.util.Arrays;

public class TestHomework3 
{
    public static void main(String[] args)
    {
        
        Homework3 myHW3 = new Homework3();
        int[] d = null;
        int n = 0, low = 0, high = 0;
        int src = -1, dest = -1;
        final int inf = 99999;
        int numPassedTests = 0;
        int numTotalTests = 0;
        String testResult;
        
        // declare and print out the array
        int[] myArray = {10, 15, 20, 8, 32, 6, 11, 3, 19, 22, 17};
        
        System.out.println("Tests 1 to 5 are based on the following array:");
        System.out.println(Arrays.toString(myArray) + "\n");
        
        // Test 1
        numTotalTests++;
        int iReturn = -1;
        testResult = "[Failed]";
        String eMsg = "N/A";
        try
        {
            low = 0;
            high = 10;
            
            iReturn = myHW3.indexOfMin(myArray, low, high);
            
            if (iReturn == 7)
            {
                numPassedTests++;
                testResult = "[Passed]";
            }
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
        
        System.out.println("Test " + numTotalTests + ": indexOfMin(low = " + low + ", high = " + high + ") - " + testResult);
        System.out.println(" Expected: 7");
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: " + iReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n");
        
        // Test 2
        numTotalTests++;
        iReturn = -1;
        testResult = "[Failed]";
        eMsg = "N/A";
        try
        {
            low = 1;
            high = 4;
            
            iReturn = myHW3.indexOfMin(myArray, low, high);
            
            if (iReturn == 3)
            {
                numPassedTests++;
                testResult = "[Passed]";
            }
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
        
        System.out.println("Test " + numTotalTests + ": indexOfMin(low = " + low + ", high = " + high + ") - " + testResult);
        System.out.println(" Expected: 3");
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: " + iReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n");
        
        // Test 3
        numTotalTests++;
        iReturn = -1;
        testResult = "[Failed]";
        eMsg = "N/A";
        try
        {
            low = 7;
            high = 10;
            
            iReturn = myHW3.indexOfMin(myArray, low, high);
            
            if (iReturn == 7)
            {
                numPassedTests++;
                testResult = "[Passed]";
            }
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
        
        System.out.println("Test " + numTotalTests + ": indexOfMin(low = " + low + ", high = " + high + ") - " + testResult);
        System.out.println(" Expected: 7");
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: " + iReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n");
        
        // Test 4
        numTotalTests++;
        iReturn = -1;
        testResult = "[Failed]";
        eMsg = "N/A";
        try
        {
            low = 5;
            high = 6;
            
            iReturn = myHW3.indexOfMin(myArray, low, high);
            
            if (iReturn == 5)
            {
                numPassedTests++;
                testResult = "[Passed]";
            }
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
        
        System.out.println("Test " + numTotalTests + ": indexOfMin(low = " + low + ", high = " + high + ") - " + testResult);
        System.out.println(" Expected: 5");
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: " + iReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n"); 
        
        // Test 5
        numTotalTests++;
        iReturn = -1;
        testResult = "[Failed]";
        eMsg = "N/A";
        try
        {
            low = 10;
            high = 10;
            
            iReturn = myHW3.indexOfMin(myArray, low, high);
            
            if (iReturn == 10)
            {
                numPassedTests++;
                testResult = "[Passed]";
            }
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
        
        System.out.println("Test " + numTotalTests + ": indexOfMin(low = " + low + ", high = " + high + ") - " + testResult);
        System.out.println(" Expected: 10");
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: " + iReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n");
        
        // declare and print out matrices W and P
        int[][] W = {
            {0, 0, 0, 0, 0, 0},
            {0, 0, 1, inf, 1, 5},
            {0, 9, 0, 3, 2, inf},
            {0, inf, inf, 0, 4, inf},
            {0, inf, inf, 2, 0, 3},
            {0, 3, inf, inf, inf, 0}
            };
        
        int[][] P = {
            {0, 0, 0, 0, 0, 0},
            {0, 0, 0, 4, 0, 4}, 
            {0, 5, 0, 0, 0, 4}, 
            {0, 5, 5, 0, 0, 4}, 
            {0, 5, 5, 0, 0, 0}, 
            {0, 0, 1, 4, 1, 0} 
        };
        
        System.out.println("Tests 6 to 10 are based on the following adjacent matrix W and shortest path matrix P:");
        System.out.println("W = ");
        for (int i = 1; i < W.length; i++)
        {
            for (int j = 1; j < W[i].length; j++)
                if (W[i][j] == inf)
                    System.out.format("%-6s", "∞");
                else
                    System.out.format("%-6d", W[i][j]);
            
            System.out.println();
        }
            
        System.out.println("\nP = ");
        for (int i = 1; i < P.length; i++)
        {
            for (int j = 1; j < P[i].length; j++)
                if (W[i][j] == inf)
                    System.out.format("%-6s", "∞");
                else
                    System.out.format("%-6d", P[i][j]);
            
            System.out.println();
        }     
        
        System.out.println();
        
        // Test 6
        numTotalTests++;
        iReturn = -1;
        testResult = "[Failed]";
        eMsg = "N/A";
        try
        {
            src = 1;
            dest = 2;
            
            iReturn = myHW3.minCostRec(src, dest, W, P);
            
            if (iReturn == 1)
            {
                numPassedTests++;
                testResult = "[Passed]";
            }
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
        
        System.out.println("Test " + numTotalTests + ": minCostRec(src = " + src + ", dest = " + dest + ") - " + testResult);
        System.out.println(" Expected: 1");
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: " + iReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n");          
        
        // Test 7
        numTotalTests++;
        iReturn = -1;
        testResult = "[Failed]";
        eMsg = "N/A";
        try
        {
            src = 2;
            dest = 1;
            
            iReturn = myHW3.minCostRec(src, dest, W, P);
            
            if (iReturn == 8)
            {
                numPassedTests++;
                testResult = "[Passed]";
            }
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
        
        System.out.println("Test " + numTotalTests + ": minCostRec(src = " + src + ", dest = " + dest + ") - " + testResult);
        System.out.println(" Expected: 8");
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: " + iReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n");  
        
        // Test 8
        numTotalTests++;
        iReturn = -1;
        testResult = "[Failed]";
        eMsg = "N/A";
        try
        {
            src = 3;
            dest = 2;
            
            iReturn = myHW3.minCostRec(src, dest, W, P);
            
            if (iReturn == 11)
            {
                numPassedTests++;
                testResult = "[Passed]";
            }
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
        
        System.out.println("Test " + numTotalTests + ": minCostRec(src = " + src + ", dest = " + dest + ") - " + testResult);
        System.out.println(" Expected: 11");
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: " + iReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n");
        
        // Test 9
        numTotalTests++;
        iReturn = -1;
        testResult = "[Failed]";
        eMsg = "N/A";
        try
        {
            src = 5;
            dest = 3;
            
            iReturn = myHW3.minCostRec(src, dest, W, P);
            
            if (iReturn == 6)
            {
                numPassedTests++;
                testResult = "[Passed]";
            }
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
        
        System.out.println("Test " + numTotalTests + ": minCostRec(src = " + src + ", dest = " + dest + ") - " + testResult);
        System.out.println(" Expected: 6");
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: " + iReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n");
        
        // Test 9
        numTotalTests++;
        iReturn = -1;
        testResult = "[Failed]";
        eMsg = "N/A";
        try
        {
            src = 5;
            dest = 4;
            
            iReturn = myHW3.minCostRec(src, dest, W, P);
            
            if (iReturn == 4)
            {
                numPassedTests++;
                testResult = "[Passed]";
            }
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
        
        System.out.println("Test " + numTotalTests + ": minCostRec(src = " + src + ", dest = " + dest + ") - " + testResult);
        System.out.println(" Expected: 4");
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: " + iReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n");
        
        // Test 10
        numTotalTests++;
        iReturn = -1;
        testResult = "[Failed]";
        eMsg = "N/A";
        try
        {
            src = 3;
            dest = 3;
            
            iReturn = myHW3.minCostRec(src, dest, W, P);
            
            if (iReturn == 0)
            {
                numPassedTests++;
                testResult = "[Passed]";
            }
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
        
        System.out.println("Test " + numTotalTests + ": minCostRec(src = " + src + ", dest = " + dest + ") - " + testResult);
        System.out.println(" Expected: 0");
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: " + iReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n");  
        
        // Test 11
        numTotalTests++;
        iReturn = -1;
        String sReturn = "";
        testResult = "[Failed]";
        eMsg = "N/A";
        try
        {
            n = 5;  // number of matrices
            int[] tmp = {6, 5, 4, 6, 5, 8};   // matrix dimensions, starting from d_0 and ending at d_n
            d = tmp;
            int[][] M = new int[n + 1][n + 1];
            P = new int[n + 1][n + 1];
            
            // populate the first row and firt column with zeros
            for (int m = 0; m <= n; m++)
                M[0][m] = M[m][0] = P[0][m] = P[m][0] = 0;
            
            iReturn = myHW3.minMulti(n, d, M, P);
            sReturn = myHW3.buildOrder(P, 1, n, sReturn);
            sReturn = sReturn.substring(1, sReturn.length() - 1);   // remove the first and the last parenthesis
            
            if (iReturn == 592 && sReturn.equals("(A1A2)((A3A4)A5)"))
            {
                numPassedTests++;
                testResult = "[Passed]";
            }
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
        
        System.out.println("Test " + numTotalTests + ": d = " + Arrays.toString(d) + ", buildOrder(1, " + n + ") - " + testResult);
        System.out.println(" Expected: min # multiplications = 592 and order is (A1A2)((A3A4)A5)");
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: min # multiplications = " + iReturn + " and order is " + sReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n");
        
        // Test 12
        numTotalTests++;
        iReturn = -1;
        sReturn = "";
        testResult = "[Failed]";
        eMsg = "N/A";
        try
        {
            n = 6;  // number of matrices
            int[] tmp = {5, 2, 3, 4, 6, 7, 8};   // matrix dimensions, starting from d_0 and ending at d_n
            d = tmp;
            int[][] M = new int[n + 1][n + 1];
            P = new int[n + 1][n + 1];
            
            // populate the first row and firt column with zeros
            for (int m = 0; m <= n; m++)
                M[0][m] = M[m][0] = P[0][m] = P[m][0] = 0;
            
            iReturn = myHW3.minMulti(n, d, M, P);
            sReturn = myHW3.buildOrder(P, 1, n, sReturn);
            sReturn = sReturn.substring(1, sReturn.length() - 1);   // remove the first and the last parenthesis
            
            if (iReturn == 348 && sReturn.equals("A1((((A2A3)A4)A5)A6)"))
            {
                numPassedTests++;
                testResult = "[Passed]";
            }
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
  
        System.out.println("Test " + numTotalTests + ": d = " + Arrays.toString(d) + ", buildOrder(1, " + n + ") - " + testResult);
        System.out.println(" Expected: min # multiplications = 348 and order is A1((((A2A3)A4)A5)A6)");
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: min # multiplications = " + iReturn + " and order is " + sReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n");
        
        // Test 13
        numTotalTests++;
        iReturn = -1;
        sReturn = "";
        testResult = "[Failed]";
        eMsg = "N/A";
        try
        {
            n = 6;  // number of matrices
            int[] tmp = {1, 2, 3, 4, 5, 6, 7};   // matrix dimensions, starting from d_0 and ending at d_n
            d = tmp;
            int[][] M = new int[n + 1][n + 1];
            P = new int[n + 1][n + 1];
            
            // populate the first row and firt column with zeros
            for (int m = 0; m <= n; m++)
                M[0][m] = M[m][0] = P[0][m] = P[m][0] = 0;
            
            iReturn = myHW3.minMulti(n, d, M, P);
            sReturn = myHW3.buildOrder(P, 1, n, sReturn);
            sReturn = sReturn.substring(1, sReturn.length() - 1);   // remove the first and the last parenthesis
            
            if (iReturn == 110 && sReturn.equals("((((A1A2)A3)A4)A5)A6"))
            {
                numPassedTests++;
                testResult = "[Passed]";
            }
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
  
        System.out.println("Test " + numTotalTests + ": d = " + Arrays.toString(d) + ", buildOrder(1, " + n + ") - " + testResult);
        System.out.println(" Expected: min # multiplications = 110 and order is ((((A1A2)A3)A4)A5)A6");
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: min # multiplications = " + iReturn + " and order is " + sReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n");     
        
        // Test 14
        numTotalTests++;
        iReturn = -1;
        sReturn = "";
        testResult = "[Failed]";
        eMsg = "N/A";
        try
        {
            n = 8;  // number of matrices
            int[] tmp = {9, 8, 7, 6, 5, 4, 3, 2, 1};   // matrix dimensions, starting from d_0 and ending at d_n
            d = tmp;
            int[][] M = new int[n + 1][n + 1];
            P = new int[n + 1][n + 1];
            
            // populate the first row and firt column with zeros
            for (int m = 0; m <= n; m++)
                M[0][m] = M[m][0] = P[0][m] = P[m][0] = 0;
            
            iReturn = myHW3.minMulti(n, d, M, P);
            sReturn = myHW3.buildOrder(P, 1, n, sReturn);
            sReturn = sReturn.substring(1, sReturn.length() - 1);   // remove the first and the last parenthesis
            
            if (iReturn == 238 && sReturn.equals("A1(A2(A3(A4(A5(A6(A7A8))))))"))
            {
                numPassedTests++;
                testResult = "[Passed]";
            }
        }
        catch (RuntimeException e)
        {
            eMsg = "RuntimeException - \"" + e.getMessage()  + "\"";
        }
        catch (StackOverflowError e)
        {
            eMsg = "Stack Overflow error occurred.";   
        }
  
        System.out.println("Test " + numTotalTests + ": d = " + Arrays.toString(d) + ", buildOrder(1, " + n + ") - " + testResult);
        System.out.println(" Expected: min # multiplications = 238 and order is A1(A2(A3(A4(A5(A6(A7A8))))))");
        if (eMsg.equals("N/A"))
            System.out.println(" Yours: min # multiplications = " + iReturn + " and order is " + sReturn + "\n");
        else
            System.out.println(" Yours: " + eMsg + "\n");
        
        System.out.println("Total test cases: " + numTotalTests + "\nCorrect: " + numPassedTests + "\nWrong: " + (numTotalTests - numPassedTests));
    }
}