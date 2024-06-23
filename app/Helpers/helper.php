<?php

use Illuminate\Support\Str;
use App\Models\CompanyDetail;
use App\Models\ProductInventory;
use App\Models\ProductVariation;
use Illuminate\Http\JsonResponse;


/**
 * Encrypts a string using a salt key.
 *
 * @param string $string The string to be encrypted.
 *
 * @return string|array If successful, returns the encrypted string. 
 *                      If no string provided, returns an array with status false and an error message.
 */
if (!function_exists('salt_encrypt')) {
    function salt_encrypt($string)
    {
        //return $string;
        if (!empty($string)) {
            $encrypted = encrypt(env('SALT_KEY') . $string);
            return $encrypted;
        } else {
            return [
                'status' => false,
                'message' => 'Error: Please provide string to be decrypted.'
            ];
        }
    }
}

/**
 * Decrypts an encrypted string, removing the salt key from it.
 *
 * @param string $string The encrypted string to be decrypted.
 *
 * @return string|array If successful, returns the decrypted string. 
 *                      If no encrypted string provided, returns an array with status false and an error message.
 */
if (!function_exists('salt_decrypt')) {
    function salt_decrypt($string)
    {
        //return $string;
        if (!empty($string)) {
            $decrypted = decrypt($string);
            $mainString = str_replace(env('SALT_KEY'), '', $decrypted);
            return $mainString;
        } else {
            return [
                'status' => false,
                'message' => 'Error: Please provide encrypted string.'
            ];
        }
    }
}

/**
 * Prints the human-readable representation of a variable and exits the script.
 *
 * This function is useful for debugging purposes to print out the contents of a variable
 * in a human-readable format and then exit the script execution.
 *
 * @param mixed $string The variable to be printed.
 *
 * @return void This function does not return a value.
 */
if (!function_exists('printR')) {
    function printR($string)
    {
        echo '<pre>';
        print_r($string);
        echo '</pre>';
        exit;
    }
}

if (!function_exists('generateUniqueCompanyUsername')) {
    function generateUniqueCompanyUsername($companyName = null)
    {
        if(!$companyName){
              // Extract the initials
        $username = '';
        $words = explode(' ', $companyName);
        if(count($words)== 1){
            $username = strtoupper($words[0]);
        } else {
            foreach ($words as $word) {
                $username .= strtoupper($word[0]);
            }
        }

        $counter = 1;
        $originalUsername = $username;

        // Ensure the username is unique
        while (CompanyDetail::where('display_name', $username)->exists()) {
            $username = $originalUsername . $counter;
            $counter++;
        }

        return $username;

        }else{
            return '';
        }
      
    }



    // Function to convert an image to a Base64-encoded string
    function convertImageToBase64($imagePath)
    {
        // Check if the file exists
        if (file_exists($imagePath)) {
            // Get the image content
            $imageData = file_get_contents($imagePath);

            // Encode the image content in Base64
            $base64Image = base64_encode($imageData);

            // Get the image type
            $imageType = pathinfo($imagePath, PATHINFO_EXTENSION);

            // Return the Base64 encoded image with the appropriate data URL prefix
            return 'data:image/' . $imageType . ';base64,' . $base64Image;
        } else {
            // Handle the error if the file does not exist
            return null;
        }
    }

    /**
     * Generate an error response.
     *
     * @param string $message
     * @return JsonResponse
     */
    function errorResponse(string $message): JsonResponse
    {
        $parts = explode("-", $message);
        $key = '';
        if (!empty($parts)) {
            $message = $parts[0];
            $key = $parts[1] ?? null;
        }
        $response = [
            'statusCode' => __('statusCode.statusCode422'),
            'status' => __('statusCode.status422'),
            'message' => $message
        ];
        if ($key) {
            if (strpos($key, '.') !== false) {
                $a = explode('.', trim($key));
                $key = $a[0][0].'_'.$a[1];
            }
            $response['key'] = trim($key);
        }
        return response()->json(['data' => $response], __('statusCode.statusCode200'));
    }

    /**
     * Generate a success response.
     *
     * @param int|null $id
     * @return JsonResponse
     */
    function successResponse(int $id = null, array $data = null): JsonResponse
    {
        $response = [
            'statusCode' => __('statusCode.statusCode200'),
            'status' => __('statusCode.status200'),
            'message' => __('auth.registerSuccess'),
        ];

        if ($id) {
            $response['id'] = $id;
        }
        if ($data) {
            $response['data'] = $data;
        }

        return response()->json(['data' => $response],  __('statusCode.statusCode200'));
    }

    /**
     * Generate a company serial ID based on the given ID and type.
     *
     * @param int $id The ID of the company.
     * @param string $type The type of the company.
     * @return string The generated company serial ID.
     */
    function generateCompanySerialId($id, $type)
    {
        // Format the new supplier ID with leading zeros and 's' prefix
        return $type . str_pad($id, 6, '0', STR_PAD_LEFT);
    }


    /**
     * Generates a unique SKU for a product based on its name, category and the current time.
     *
     * The SKU is composed of:
     * - The first 2 characters of the product name (uppercase)
     * - The first 2 characters of the category name (uppercase)
     * - The last 4 digits of the current Unix timestamp
     * - A random 4-digit number
     *
     * Ensures the generated SKU is unique by checking against existing SKUs in the database.
     *
     * @param string $name The name of the product.
     * @param string $category The category of the product.
     * @return string The generated SKU, which is a maximum of 10 characters long.
     */
    function generateSKU($name, $category)
    {
        $namePart = strtoupper(substr($name, 0, 2));

        $categoryPart = strtoupper(substr($category, 0, 2));

        $timePart = substr(time(), -4);

        $randomPart = mt_rand(1000, 9999);

        $sku = $namePart . $categoryPart . $timePart . $randomPart;

        while (ProductVariation::where('sku', $sku)->exists()) {
            $randomPart = mt_rand(1000, 9999);
            $sku = $namePart . $categoryPart . $timePart . $randomPart;
        }

        return substr($sku, 0, 12);
    }


    /**
     * Print the SQL query along with the parameter bindings for debugging purposes.
     *
     * This function takes a query builder instance as input, retrieves the SQL query string,
     * and the parameter bindings from the query. It then combines them to create a complete
     * SQL query with actual parameter values for display and debugging purposes.
     *
     * @param \Illuminate\Database\Query\Builder $query The query builder instance to print.
     *
     * @return string The combined SQL query with actual parameter values.
     *
     *
     * @example
     * $query = DB::table('users')
     *            ->where('name', 'John')
     *            ->orWhere('age', '>', 30);
     *
     * $combinedQuery = printQueryWithParameters($query);
     * echo $combinedQuery;
     *
     * // Output:
     * // select * from `users` where `name` = 'John' or `age` > 30
     */
    function printQueryWithParameters($query)
    {
        // Get the SQL query string
        $sql = $query->toSql();

        // Get the parameter bindings
        $bindings = $query->getBindings();

        // Combine them for display
        return vsprintf(str_replace(['%', '?'], ['%%', "'%s'"], $sql), $bindings);
    }

    /**
     * Get the string representation of a status based on its type value.
     *
     * @param int $type The type value of the status.
     * @return string The string representation of the status.
     */
    function getStatusName($type)
    {
        switch ($type) {
            case ProductInventory::STATUS_ACTIVE:
                return 'Active';
            case ProductInventory::STATUS_INACTIVE:
                return 'Inactive';
            case ProductInventory::STATUS_OUT_OF_STOCK:
                return 'Out of Stock';
            case ProductInventory::STATUS_DRAFT:
                return 'Draft';
            default:
                return 'Unknown';
        }
    }

    /**
     * Get the string representation of an availability status based on its type value.
     *
     * @param int $type The type value of the availability status.
     * @return string The string representation of the availability status.
     */
    function getAvailablityStatusName($type)
    {
        switch ($type) {
            case ProductInventory::TILL_STOCK_LAST:
                return 'Till Stock Last';
            case ProductInventory::REGULAR_AVAILABLE:
                return 'Regular Available';
            default:
                return 'Unknown';
        }
    }
}
